<?php

	class kcprofileView extends View {
		
		public function __construct() {
			parent::__construct();
			
			
		}
		
		
		
		public function loadLoginPage() {
			
			$title = "Panel Login | " . $this->siteName;
			$template = "loginTemplate.php";
			
			$this->loadPage($title, $template, false, false);
			
		}
		
	}

?>
