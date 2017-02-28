<?php

Class ColorizeCodeWithPrismJSPrettifyCDNHooks
{

    /**
     * onColorize hook
     *
     * Adds enabled/disabled switches for WikiEditor modules
     * @param $parser Parser
     * @return bool
     */
    static public function onColorize(Parser $parser) {
        global $wgColorizeCodeWithPrismJSPrettifyCDNTag;

        if( empty($wgColorizeCodeWithPrismJSPrettifyCDNTag) ) {
            $wgColorizeCodeWithPrismJSPrettifyCDNTag = ['code'];
        }

        foreach( (array) $wgColorizeCodeWithPrismJSPrettifyCDNTag as $tag ) {
            $parser->setHook($tag, array('ColorizeCodeWithPrismJSPrettifyCDNHooks', 'parserHook'));
        }
        return true;
    }


    /**
     * parserHook hook
     *
     * Adds enabled/disabled switches for WikiEditor modules
     * @param $input
     * @param $args array
     * @param $parser Parser
     * @param $frame PPFrame
     * @param $sk
     * @return bool
     */
    static public function parserHook( $input, array $args, Parser $parser, PPFrame $frame ) {
        global $ColorizeCodeWithPrismJSPrettifyCDNCore;

        $classPre = ['prettyprint', 'prismjsprint']; // keep prettyprint
        $classCode = [];

        if( isset($args['lang']) && !empty($args['lang']) )
            $classCode[] = 'language-' . trim($args['lang']);

        $input = str_replace('&', '&amp;', $input);
        $input = str_replace('<', '&lt;', $input);
        $input = str_replace('>', '&gt;', $input);

        return   '<pre class="' . implode(' ', $classPre) . '"><code class="' . implode(' ', $classCode) . '">'
                . trim($input, PHP_EOL)
                . '</code></pre>';
    }


    /**
     * BeforePageDisplay hook
     *
     * Adds enabled/disabled switches for WikiEditor modules
     * @param $wgOut array
     * @param $sk
     * @return bool
     */
    static public function BeforePageDisplay(&$wgOut, &$sk) {
        $wgOut->addModules('ext.ColorizeCodeWithPrismJSPrettifyCDN');
        return true;
    }


    /**
     * MakeGlobalVariablesScript hook
     *
     * Adds enabled/disabled switches for WikiEditor modules
     * @param $vars array
     * @return bool
     */
    public static function makeGlobalVariablesScript( &$vars ) {
        global $wgColorizeCodeWithPrismJSPrettifyCDNCore,
               $wgColorizeCodeWithPrismJSPrettifyCDNSkin,
               $wgColorizeCodeWithPrismJSPrettifyCDNAutorun,
               $wgColorizeCodeWithPrismJSPrettifyCDNLanguages;
               // $wgColorizeCodeWithPrismJSPrettifyCDNAutoLinenums not needed here

        if( is_null($wgColorizeCodeWithPrismJSPrettifyCDNAutorun) )
            $wgColorizeCodeWithPrismJSPrettifyCDNAutorun = true;

        $vars['wgColorizeCodeWithPrismJSPrettifyCDNCore'] = $wgColorizeCodeWithPrismJSPrettifyCDNCore;
        $vars['wgColorizeCodeWithPrismJSPrettifyCDNSkin'] = $wgColorizeCodeWithPrismJSPrettifyCDNSkin;
        $vars['wgColorizeCodeWithPrismJSPrettifyCDNAutorun'] = (boolean) $wgColorizeCodeWithPrismJSPrettifyCDNAutorun;
        $vars['wgColorizeCodeWithPrismJSPrettifyCDNLanguages'] = (array) $wgColorizeCodeWithPrismJSPrettifyCDNLanguages;

        return true;
    }
}