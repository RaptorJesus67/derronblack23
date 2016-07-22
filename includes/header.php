<!DOCTYPE html>
<html>
	<head>
		<meta name='viewport' content="width=device-width, initial-scale=1.0" />
		<title><?php echo $this->title; ?></title>
		
		<!-- JS -->
		<?php require_once(BASE_CLIENT . "javascript/js.html"); ?>
		
		<!-- STYLESHEETS -->
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URI; ?>css/strudel.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URI; ?>css/slick.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URI; ?>css/slick-theme.css" />
		<link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css' />
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URI; ?>css/desktopStyle.css" />
	</head>
</html>
<body>
	<?php if ($this->h): ?>
	<header>
		<div class='siteTitle'>
			<h2><?php echo $this->pageName; ?></h2>
		</div>
		<nav>
			<ul>
				<li class='navLink' id='bioLink'>Bio</li>
				<li class='navLink' id='emmettTillLink'>Emmett Till</li>
				<li class='navLink' id='bioBookLink'>Biography Preorder</li>
				<li class='navLink' id='eventsLink'>Events</li>
				<li class='navLink' id='socialLink'>Social</li>
			</ul>
		</nav>
	</header>
	<?php endif; ?>
	
