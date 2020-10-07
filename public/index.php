<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define( 'PUBLIC_PATH', __DIR__);
define( 'APPLICATION_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'application' );
define(	'PAGES_PATH', APPLICATION_PATH . DIRECTORY_SEPARATOR . 'pages' );
define( 'INC_PATH',	APPLICATION_PATH . DIRECTORY_SEPARATOR .'includes' );
define(	'TPL_PATH',	APPLICATION_PATH . DIRECTORY_SEPARATOR . 'templates' );
define(	'CLASS_PATH', APPLICATION_PATH . DIRECTORY_SEPARATOR . 'classes' );

 // Appel du routage d'url
require_once CLASS_PATH . DIRECTORY_SEPARATOR .'url.class.php';
$page = Url::url_rewrite();

 // Appel du coeur de l'application
require_once CLASS_PATH . DIRECTORY_SEPARATOR . 'application.class.php';
$content = Application::load_body($page);

// Appel du rendu de la page
Application::load_layout($content['content'],$content['layout']);

