Colorize Code With PrismJS Prettify CDN
=======================================

A wikimedia extension to add beautiful syntax highlighting with the power of PrismJS (http://prismjs.com)


Installation
============

* Open LocalSettings.php file
* Add ``wfLoadExtension( 'ColorizeCodeWithPrismJSPrettifyCDN' );``
* Add options if needed
* Use your wiki


Syntax
======

  <source lang="php">
  <?php echo 'Hello world'; ?>
  </source>

  You have to specify the langage each time you use it. There is no automatic langage detection.


TODO
====
	[ ] PrismJS Plugins (num lines, ...)