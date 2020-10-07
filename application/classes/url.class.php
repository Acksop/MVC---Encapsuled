<?php 
class Url
{
	/**
	 * Fonction permettant de réécrire les urls de navigation dans les pages de template
	 * A utiliser a chaque fois afin de permettre une modification future du système de routing
	 *
	 * @param string $page
	 * @param array $params
	 * @return string
	 */
	static public function link_rewrite($page, $params = array())
	{
		$stringParams = '';
		foreach($params as $key => $values){
			$stringParams .= "/" . $key ."/" . $values;
		}
		return (('home' == $page) ? '/' : '/' . $page . $stringParams);
		
	}
	/**
	 * Fonction permettant de récupérer les variables provenant de l'url et de définir la page et le template a charger
	 *
	 * @return array 
	 */
	static public function url_rewrite()
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
