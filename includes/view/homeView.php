<?php

	class homeView extends View {
		
		public function __construct() {
			parent::__construct();
			
			
			$this->loadHomePage();
			
			
		}
		
		
		
		private function loadHomePage() {
			
			$title = $this->siteName . " | Candidate for State Rep - District 23";
			$template = "homeTemplate.php";
			
			$this->loadPage($title, $template, false, true);	
			
		}
		
	}

?>
