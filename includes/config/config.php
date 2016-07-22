<?php
	
	
	/*
	*
	*	KCPHP-MVC
	*
	*	A simple lightweight framework that simply organizes code and
	*		allows the programmer to use as many or as little of the tools built in.
	*	Some tools are 3rd Party, to which full credit is given both in the
	*		configuration file, and their respected files as well.
	*	Feel free to add, delete, or edit whichever bits of code are here to make
	*		your project easier.
	*
	*	@copyright			2016					MIT License
	*	@author				Mitchell Mullvain		<experienceit12@gmail.com>
	*	@version			1.0
	*
	*
	*/
	
	
	$domain = "derronblack23.loc";			# String. The domain name. "localhost" if on test server
	$base = "/var/www/derronblack/";		# String. "/var/www/" on most servers
	$errors = true;					# Show errors. Set to 'false' on production server
	$sessions = true;				# If user requires sessions in site
	$sql = true;					# If access to MySQL is desired
	
	
	
	
	/*
	*
	*	Creation of sessions and cookies
	*
	*/
	
	 // Change ".localhost" to ".yourdomainname.domaintype"
	ini_set('session.cookie_domain', "." . $domain);
	
	// Start Session
	session_start();
	
	
	/*
	*
	*	Error Reporting Setup
	*
	*/
	if ($errors) {
		
		// Show all the errors
		error_reporting(E_ALL);
		ini_set( "display_errors", 1); 
		
	} else {
	
		// Show no errors
		error_reporting(E_NONE);
		ini_set("display_errors", 0);
		
	}
	
	
	
	/*
	*
	*	IMPORTANT Site Constants Used Throughout
	*
	*/
	
	//
	// BASE_DOMAIN	-	This is the domain by itself
	//
	define('BASE_DOMAIN', $domain . '/');
	
	//
	// BASE_URI		-	This is the first part of the URL
	//						It is used for calling a file with one main constant
	//						This is the BASE_DOMAIN with the HTTP prefix
	//
	//		ex:	echo BASE_URI . "images/background.jpg";
	//
	define('BASE_URI', 'http://' . BASE_DOMAIN);
	
	
	//
	// BASEPATH		-	This is used as the base of the sites root folder
	//						This is mainly used as a prefix for the "public_html"
	//						and includes folder
	//
	//		SINGLE SERVER USE: probably will be: '/var/www/'
	//
	define('BASEPATH', $base);
	
	
	//
	// BASE_INCLUDE	-	This is used for include() and require() statements for files
	//						located out of the "publc_html" directory in the "includes"
	//						directory. This is the BASEPATH constant with the
	//						'includes/' suffix
	//
	//		ex: require_once(BASE_INCLUDE . "config/config.php");
	//
	define('BASE_INCLUDE', BASEPATH . 'includes/');
	
	
	//
	// BASE_CLIENT	-	This is used for include() and require() statements for files
	//						located in the "public_html" directory.
	//						This is the BASEPATH constant with the 'public_html/' suffix
	//
	//		ex: require_once(BASE_CLIENT . "js/jquery.js");
	//
	define('BASE_CLIENT', BASEPATH . "public_html/");
	
	
	
	/*
	*
	*	AJAX CONSTANT
	*
	*	This is used to set up the AJAX constant that can be used in JS
	*
	*	@support		Angular
	*	@support		jQuery
	*
	*	@NOTE			For this handy constant to be fired off, Headers must be sent
	*						Handy JS object to pass:
	*
	*
	*					var SELF_HEADERS = {
	*										'X-Requested-With': 'XMLHttpRequest',
	*										"Content-Type": "x-www-form-urlencoded"
	*										};
	*
	*		ex: if (isset(IS_AJAX)) {
	*
	*				...Code to handle request
	*
	*			}
	*
	*/
	
	define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
	
	
	
	
	/*
	*	A Constant Site Salt
	*
	*	Design your own site salt to be hashed with desired content.
	*
	*	@NOTE:		DO NOT USE A GLOBAL SALT AND SHA1/MD5 FOR USER PASSWORDS!!!!!
	*					A global salt should be used for site related, 
	*					somewhat-sensitive data.
	*	
	*					For user passwords use the:
	*						$clean->sha256($userPassword, "yes");
	*					
	*					This will generate a random hash and password in an array 
	*					to be stored into the database. 
	*					See "includes/config/functions/cleanInput.php" for more insight.
	*
	*/
	define('SALT', '');
	
	
	// Custom error dumping; used only if $errors are set to true
	if ($errors) {
		function err_dump($type, $msg, $location) {
		
			echo "<b>$type:</b> $msg in <b>$location</b>";
			
		}
	} else {
		function err_dump(){
			return;
		}
	}
	
	
	
	
	
	require_once("functions/sessionData.php");
	#$sess = new sessionData;
	

	
	//	DATABASE LOADING
	require_once(BASEPATH . "includes/config/db/database.php");
	
	// FUNCTIONS LOADING
	require_once(BASEPATH . "includes/config/functions/functions.php");
	
	
	
	
	###########################################
	# CALL ANY GENERAL FUNCTION CLASSES HERE
	#
	#
	#
	#	CLEAN FUNCTIONS FOR: 
	#
	#		- Sanitizing (Basic; use HTMLPurifier for advanced sanitizing)
	#		- Sha256 Hashing (more secure to use with MySQL Passwords)
	#		- Random Strings (Use to generate random strings like SALTS for user passwords)
	#
	 $clean = new cleanInput;
	#
	#
	#	URL TRIMMING TO DECIPHER CONTROLLER REQUESTS
	 $url = new urlInfo;
	#
	#
	#	A CODE THAT IS STORED IN DATABASE TO GENERATE PRETTY URL'S
	#
	#	The concept is to allow word only url's without removing sensitive characters
	#	(i.e. &, %, #, @, $, *, =, -, _, etc)
	 $zepp = new zeppTranslate;
	#
	#
	#
	# HTML PURIFIER INSTANCE
	#
	#	DO NOT ADJUST UNLESS YOU ARE FAMILIAR WITH HTMLPURIFIER SETTINGS!!!
	#
	 $purifyConfig = HTMLPurifier_Config::createDefault();
     $purifier = new HTMLPurifier($purifyConfig);
    #
    #
    ###########################################
	
	
	
	
	
	
	
?>
