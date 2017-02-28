Colorize Code With PrismJS Prettify CDN
=======================================

A wikimedia extension to add a beautiful syntax highlighting engine with the power of ***PrismJS*** (http://prismjs.com)


Installation
------------

* Open LocalSettings.php file
* Add ``wfLoadExtension( 'ColorizeCodeWithPrismJSPrettifyCDN' );``
* Add options if needed
* Use your wiki


Syntax
------

```
<source lang="php">
<?php echo 'Hello world'; ?>
</source>
```

> You have to specify the langage each time you use it. There is no automatic langage detection.


Options
-------

```php
/************************************************************************************
 * Wiki Tag (mendatory)                                                             *
 ************************************************************************************
 *   Type:    string|array                                                          *
 *   Values:  any tag, example: source -> <source></source>                         *
 *   Default: code  -> <code></code>                                                *
 ************************************************************************************
 *  If tag is 'source', you can use as following:                                   *
 *   <source lang="php">...</source>                                                *
 ************************************************************************************/
$wgColorizeCodeWithPrismJSPrettifyCDNTag  = ['source'];

/************************************************************************************
 * Skin                                                                             *
 ************************************************************************************
 *   Type:    string                                                                *
 *   Values:                                                                        *
 *    - PrismJS: default, okaidai, dark, funky, twilight, coy, solarizedlight       *
 *   Default: default theme for the      engine                                     *
 ************************************************************************************/
$wgColorizeCodeWithPrismJSPrettifyCDNSkin = 'okaidia';

/************************************************************************************
 * Auto run mode                                                                    *
 ************************************************************************************
 *   Type:    boolean                                                               *
 *   Values:  true|false                                                            *
 *   Default: true                                                                  *
 ************************************************************************************/
$wgColorizeCodeWithPrismJSPrettifyCDNAutorun = true;

/************************************************************************************
 * Auto run mode                                                                    *
 ************************************************************************************
 *   Type:    boolean                                                               *
 *   Values:  true|false                                                            *
 *   Default: All googleCodePrettify or PrismJS default languages                   *
 ************************************************************************************
 *  If there is a '*' on the values, the script will load at leat the minima values *
 *  Otherwize, the script will load only the values on the variable                 *
 ************************************************************************************/
$wgColorizeCodeWithPrismJSPrettifyCDNLanguages = ['php', 'css', '*', 'abap'];
```

TODO
------------
- [ ] PrismJS Plugins (num lines, ...)