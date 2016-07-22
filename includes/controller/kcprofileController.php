<?php

	class kcprofileController {
		
		public function __construct() {
			
			global $url;
			
			
			$this->url = $url->trimURL();
			
			
			
			// Load the model and View
			//	Set them as globals
			$this->model = new kcprofileModel;
			$this->view = new kcprofileView;
			
			
			// This determines where the user goes
			//	acts as a directory
			$this->delimeter();
			
			
			
			
		}
		
		
		
		private function delimeter() {
		
			if (isset($_SESSION['username'], $_SESSION['token'])) {
				
				// Load the home page
				
			} else {
				
				$this->view->loadLoginPage();
				
			}
			
		}
		
		
		
	}

?>
