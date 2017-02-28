( function ( mw ) {

	var lv_params = [];

	var lv_lang;
	var lv_autorun;

	lv_autorun = mw.config.get('wgColorizeCodeWithGooglePrettifyCDNAutorun', true);


	mw.loader.load( url = ('https://cdnjs.cloudflare.com/ajax/libs/prism/1.6.0/themes/prism.min.css'), 'text/css' );
	console.log('ColorizeCodeWithPrismJSPrettifyCDN', 'load', 'prismjs:theme', url);

	if( (lv_skin = mw.config.get('wgColorizeCodeWithPrismJSPrettifyCDNSkin')) ) {
		mw.loader.load( url = ('https://cdnjs.cloudflare.com/ajax/libs/prism/1.6.0/themes/prism-' + lv_skin + '.css'), 'text/css' );
		console.log('ColorizeCodeWithPrismJSPrettifyCDN', 'load', 'prismjs:theme', url);
	}

	mw.loader.load( url = ('https://cdnjs.cloudflare.com/ajax/libs/prism/1.6.0/prism.min.js'), 'text/javascript' );
	console.log('ColorizeCodeWithPrismJSPrettifyCDN', 'load', 'prismjs:javascript', url);

	if( (lv_lang = mw.config.get('wgColorizeCodeWithPrismJSPrettifyCDNLanguages')) ) {
		lv_stop = false;

		if( lv_lang == '*' ) {
			lv_lang = ['css', 'javascript', 'html'];
		}
		
		for( a in lv_lang ) {
			if( lv_lang[a] == '*' ) {
				lv_lang.push('css');
				lv_lang.push('javascript');
				lv_lang.push('html');
			}
		}

		if( lv_stop == false) {
			setTimeout(function() { 
				for( a in lv_lang ) {
					if( lv_lang[a] == '*' ) continue;

					mw.loader.load( url = ('https://cdnjs.cloudflare.com/ajax/libs/prism/1.6.0/components/prism-' + lv_lang[a] + '.min.js'), 'text/javascript' );
					console.log('ColorizeCodeWithPrismJSPrettifyCDN', 'load:javascript', 'prismjs', url);
				}
			}, 100); // wait "prism" load
		}
	}

	
	if( lv_autorun ) {
		setTimeout(function() {
				console.log('ColorizeCodeWithPrismJSPrettifyCDN', 'load:js', 'prismjs', 'setTimeout(Prism.highlightAll, 1000);');
			Prism.highlightAll();
		}, 1000);
	}

}( mediaWiki ) );