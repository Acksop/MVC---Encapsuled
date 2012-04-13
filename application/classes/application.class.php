<?php

class Application {
	
	public function load_body(array $page){
		//Génération du contenu spécifique
		//à chaque page et mise en tampon
		ob_start();
		require_once PAGES_PATH . DIRECTORY_SEPARATOR . $page['name'] . '.php' ;
		require_once TPL_PATH . DIRECTORY_SEPARATOR . $page['name'] .'.phtml' ;	
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
		
	}
	public function load_layout($content){
		require_once INC_PATH . DIRECTORY_SEPARATOR . 'layout.phtml';
	}
	
}
