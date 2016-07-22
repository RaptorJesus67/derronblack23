<?php


	/*
	*
	*	Designed to get information about the URL
	*
	*	Can be used for manipulation of URL data. If running a site using
	*		mod_rewrite, then this is a must.
	*	
	*	The purpose of this module is to allow the controller to load certain bits
	*		of data based on the values presented inside the URL.
	*
	*	@author				Mitchell Mullvain		<experienceit12@gmail.com>
	*	@category			Modules
	*	@copyright			2016					MIT License
	*			
	*
	*/
	class urlInfo {
		
		
		/*
		*
		*	ERRORS MESSAGES:
		*
		*	URL01 - camelCase()
		*		Cause: When a user uses an inappropriate variable type. 
		*				Only "create" and "break" are accepted
		*
		*
		*/
		
		
		
		
		
		
		
		
		
		/*
		*
		*	trimURL()
		*
		*	Takes the current URL and splits it into an array for use
		*	
		*	@access			public			[used in sub-controllers]
		*	@return			string[]		[the url "directories" split into array]
		*
		*/
		public function trimURL() {
			
			// Grab the current URL to be split
			$url = $_SERVER['REQUEST_URI'];
			
			
			// Split the URL by the "/" delimeter
			//		this will make it easy to control access
			$params = explode("/", $url);
			
			
			// Reset the $url variable as an empty array
			//	to be used to store the bits of the URL
			$url = array();
			
			
			// Loop through each item
			for ($i = 0; $i < count($params); $i++) {
				
				
				// Skip the first delimeter
				//	this is just the domain and isn't needed
				if ($i == 0) {
					continue;
				}
				
				
				// Sutract one so that the first part after the domain name
				//	is given a value of 0, the standard array starting point
				$url[$i - 1] = $params[$i];
				
				
			} # END for()
			
			
			// Return the $url parameter
			//	contains a value of: string[]
			return $url;
			
			
		} # END trimURL()
		
		
		
		
		
		
		
		/*
		*
		*	Camel Case Creation/Destrution
		*
		*	This method can create a camel case string for the url
		*		It can also take the camel case word and break it.
		*
		*	@access			public				[used in the sub-controller]
		*	@param			string				$type - "create" or "break"
		*	@param			string				$string - the string to affected
		*	@return			string				Either end result or dumped error
		*
		*/
		public function camelCase($type, $string) {
			
			
			// Determine which switch type was used
			//	For ease of access, make it case insensitive
			switch(strtolower($type)) {
				
				// Create
				case "create":
					$nine = 1;
					break;
				
				// Break
				case "break":
					$nine = 2;
					break;
				
				// An incorrect usage of the $type variable
				//	Echo back to the user
				default:
					
					err_dump("ERROR URL01", 
							"Illegal value passed for Parameter 1. Only 'create' and 'break' are accepted",
							"urlInfo->camelCase()");
					return;
					break;
				
			}
			
			
			// Check for $string type.
			//	If it is not a string, return it.
			//
			if (!is_string($string)) {
				err_dump("ERROR URL02", 
						"Parameter 2 must be a string", 
						"urlInfo->camelCase()");
				return;
			}
			
			
			
			// Declare camel as null string so it can be appended later
			// This will be the return variable
			$camel = null;
			
			
			// The user is creating the Camel Case
			if ($nine == 1) {
				
				
				// Lower all characters in the string as a base
				$string = strtolower($string);
				
				
				// Separate each space in the string to give each word an array 
				//	iteration
				$stringArray = explode(" ", $string);
				
				
				// Loop through each iteration (word)
				for ($i = 0; $i < count($stringArray); $i++) {
					
					// If first iteration, make it lowercase by skipping it
					if ($i == 0) {
						
						// Do nothing.
						//	Don't continue, because it will be appended at the end
						//	of the loop.
						$stringArray[$i];
						
						
					// Every other iteration gets first character uppercase(d)
					} else {
						
						$stringArray[$i] = ucfirst($stringArray[$i]);
						
					}
					
					
					// Append each value to the string
					//	This build upon the camelCased string
					$camel .= $stringArray[$i];
					
					
				}
				
				// Return the string to the user in camel case form
				return $camel;
				
				
				
			// The User is breaking a camelCase	
			} elseif ($nine == 2) {
				
				// Split words based on capital letters
				//	$camel becomes an array
				$camel = preg_split('/(?=[A-Z&.])/', $string);
				
				
				// For each part of the original string
				for ($i = 0; $i < count($camel); $i++) {
					
					// Make each charater lowercase
					$camel[$i] = strtolower($camel[$i]);
					
					
				}
				
				// Make the array a string with each iteration combined with a space
				$cam = implode(" ", $camel);
				
				// Return the $cam string variable
				return $cam;
				
			} # END if/elseif
			
			
			
		} # END urlInfo()
		
		
		
		
	} # END urlInfo class

?>
