(function() {
	
	//////////////////////////////////////
	//	FUNCTIONS FOR JS BY PHP.JS		//
	//////////////////////////////////////
	
	// UCFIRST()
	function ucfirst(str) {
		//  discuss at: http://phpjs.org/functions/ucfirst/
		// original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
		// bugfixed by: Onno Marsman
		// improved by: Brett Zamir (http://brett-zamir.me)
		//   example 1: ucfirst('kevin van zonneveld');
		//   returns 1: 'Kevin van zonneveld'

		str += '';
		var f = str.charAt(0)
		.toUpperCase();
		return f + str.substr(1);
	}
	
	// IMPLODE()
	function implode(glue, pieces) {
		//  discuss at: http://phpjs.org/functions/implode/
		// original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
		// improved by: Waldo Malqui Silva
		// improved by: Itsacon (http://www.itsacon.net/)
		// bugfixed by: Brett Zamir (http://brett-zamir.me)
		//   example 1: implode(' ', ['Kevin', 'van', 'Zonneveld']);
		//   returns 1: 'Kevin van Zonneveld'
		//   example 2: implode(' ', {first:'Kevin', last: 'van Zonneveld'});
		//   returns 2: 'Kevin van Zonneveld'

		var i = '',
		retVal = '',
		tGlue = '';
		
		if (arguments.length === 1) {
			pieces = glue;
			glue = '';
		}
		
		if (typeof pieces === 'object') {
			
			if (Object.prototype.toString.call(pieces) === '[object Array]') {
				return pieces.join(glue);
			}
			
			for (i in pieces) {
				retVal += tGlue + pieces[i];
				tGlue = glue;
			}
			
			return retVal;
			
		}
		
		return pieces;
		
	}
	
	
	// ISSET()
	function isset() {
		//  discuss at: http://phpjs.org/functions/isset/
		// original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
		// improved by: FremyCompany
		// improved by: Onno Marsman
		// improved by: Rafał Kukawski
		//   example 1: isset( undefined, true);
		//   returns 1: false
		//   example 2: isset( 'Kevin van Zonneveld' );
		//   returns 2: true

		var a = arguments,
			l = a.length,
			i = 0,
			undef;

		if (l === 0) {
			throw new Error('Empty isset');
		}

		while (i !== l) {
			if (a[i] === undef || a[i] === null) {
				return false;
			}
			i++;
		}
		return true;
	}

	
	
	
	
	
	
	
	//////////////////////////////////////
	////		MAIN INDEX FOR		  ////
	////    	 	ANGULAR 	  	  ////
	////							  ////
	////							  ////
	////	1.) NAVIGATION			  ////
	////	2.) BAND PAGE			  ////
	////							  ////
	////							  ////
	//////////////////////////////////////
	////	GOTO: Use the listings	  ////
	////	above to navigate page	  ////
	//////////////////////////////////////
	
	
	
	
	//////////////////////////////////////
	//////////////////////////////////////
	/////////	 ANGULAR CODE	  ////////
	//////////////////////////////////////
	//////////////////////////////////////
	
	
	var base_uri = "http://sykesventures.loc/";
	
	
	// ADMIN INTIATION
	var app = angular.module("sykes", []);
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
})();	
	
	
