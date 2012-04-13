<?php

define('PUBLIC_PATH', __DIR__);
	define(  'APPLICATION_PATH', dirname(__DIR__) .
			 DIRECTORY_SEPARATOR . 'application'
			);
	define(
		'PAGES_PATH',
		APPLICATION_PATH . DIRECTORY_SEPARATOR .
		'pages'
	 );
	 define(
		'INC_PATH',
		APPLICATION_PATH . DIRECTORY_SEPARATOR .
		'includes'
	 );
	 define(
		'TPL_PATH',
		APPLICATION_PATH . DIRECTORY_SEPARATOR .
		'templates'
	 );
	 define(
		'CLASS_PATH',
		APPLICATION_PATH . DIRECTORY_SEPARATOR .
		'classes'
	 );

ini_set('display_errors',1);
 // Appel du routage d'url en PHP
require_once CLASS_PATH . DIRECTORY_SEPARATOR .'url.class.php';
$page = Url::url_rewrite();

 // Appel du coeur de l'application
require_once CLASS_PATH . DIRECTORY_SEPARATOR . 'application.class.php';
$content = Application::load_body($page);
Application::load_layout($content);

