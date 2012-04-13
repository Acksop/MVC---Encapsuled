<?php 
class Url
{
	static function link_rewrite($page, $params = array())
	{
		$stringParams = '';
		foreach($params as $key => $values){
			$stringParams .= "/" . $key ."/" . $values;
		}
		return (('home' == $page) ? '/' : '/' . $page . $stringParams);
		  // -- Bonne version
		
		/*
		//Changement de comportement d'une fonction PHP-Zend ... grrr
		array_unshift($params , $page);
		var_dump($params);
		$page = '/' . implode('/' , $params);
		*/
		return $page;
		
	}
	static function url_rewrite()
	{
		
		$url = parse_url($_SERVER['REQUEST_URI']);
		$urlParts = explode('/' , trim( $url['path'] , '/' ));
		//Récupération du nom de la page
		//$page['name'] = $urlParts[0];
		($urlParts[0] == 'index' ||$urlParts[0] == '' )?$page['name']='home':$page['name']=$urlParts[0];
		
		unset($urlParts[0]);
		
		//vérification du nombre de parametres: s'il n'existe pas autant de clé que
		// de valeurs on sort de la fonction et on renvoie une page d'erreur.
		$numParts = count($urlParts);
		if (0!=$numParts%2) {
			$page['name'] = 'error';
			$page['params'] = array();
			return $page;
		}else{
		
		$values = array();
		$keys = array();
		foreach( $urlParts as $key => $value ){
			if($key%2 == 0) {
				$values[] = $value;
			} else {
				$keys[] = $value;
			}
		}
		$page['params'] = array_combine($keys, $values);
		}
		
		$pageFile = PAGES_PATH . DIRECTORY_SEPARATOR . $page['name'] . '.php';
		
		if(!file_exists($pageFile)){
			$page['name'] = 'error';
		}
		return $page;
		
	}
	
}
