<?php

class Application {
	/**
	 * Fonction permettant de charger le composant php permettant l'établissement des variables
	 *  contenu dans le dossier 'application/pages' afin de charger le template correspondant
	 *  en fonction de la variable $page défini lors du routage
	 *
	 * @param array $page
	 * @return string
	 */
	static public function load_body(array $page){
		//Génération du contenu spécifique à chaque page par une mise en tampon
		ob_start();
		require_once PAGES_PATH . DIRECTORY_SEPARATOR . $page['name'] . '.php' ;
		require_once TPL_PATH . DIRECTORY_SEPARATOR . $page['name'] .'.phtml' ;	
		$content['content'] = ob_get_contents();
		ob_end_clean();
		if(!isset($layout)){
			$content['layout'] = 'layout';
		}else{
			$content['layout'] = $layout;
		}
		return $content;
		
	}
	/**
	 * Fonction permettant de charger le layout défini dans la page php chargée apparavent par la méthode load_body
     *
	 * @param string $content
	 * @param string $layout
	 * @return void
	 */
	static public function load_layout($content,$layout){
		require_once INC_PATH . DIRECTORY_SEPARATOR . $layout .'.phtml';
		return;
	}
	
}
