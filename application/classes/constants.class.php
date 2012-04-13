<?php
class Constants{
	/*
	
//définition des chemins de l'application
//les fonction n'ont pas l'air de fonctionner dans la definitions de constantes
// de classes, en effet elle ne peuvent pas être déclarée de façon dynamique.
	const PUBLIC_PATH = __DIR__;
	const APPLICATION_PATH = dirname(__DIR__) .
			 DIRECTORY_SEPARATOR . 'application'
			;
	const PAGES_PATH =
		self::APPLICATION_PATH . DIRECTORY_SEPARATOR .
		'pages'
	 ;
	 const INC_PATH =
		APPLICATION_PATH . DIRECTORY_SEPARATOR .
		'includes'
	 ;
	 const TPL_PATH =
		APPLICATION_PATH . DIRECTORY_SEPARATOR .
		'templates'
	 ;
	 const CLASS_PATH =
		APPLICATION_PATH . DIRECTORY_SEPARATOR .
		'classes'
	 ;
	//définition des chemins de l'application
	// ne fonctionne pas ( tout le temps ou pour l'instant?!? )
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
	
}