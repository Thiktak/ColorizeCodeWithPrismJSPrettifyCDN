<?php

if ( function_exists( 'wfLoadExtension' ) ) {
    wfLoadExtension( 'ColorizeCodeWithPrismJSPrettifyCDN' );
    // Keep i18n globals so mergeMessageFileList.php doesn't break
    wfWarn(
      'Deprecated PHP entry point used for ColorizeCodeWithPrismJSPrettifyCDN extension. Please use wfLoadExtension ' .
      'instead, see https://www.mediawiki.org/wiki/Extension_registration for more details.'
    );
    return true;
} else {
    die( 'This version of the ColorizeCodeWithPrismJSPrettifyCDN extension requires MediaWiki 1.25+' );
}