<?php
function link_rewrite($page, $params = array())
{
	//Solution élégante
	//return (('home' == $page) ? 'index.html' : $page . '.html');
	
	//Solution Professionnelle
	  // -- Mauvaise version
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
	
	//Solution Personnelle
	
	
}
function url_rewrite()
{
	//Solution élégante !
	// Avec un case pour chacune des URL listées
	/*
	$url = parse_url($_SERVER['REQUEST_URI']);
	//var_dump($url);
	parse_str(@$url['query'], $params);
	$page['params'] = $params;
	
	switch ($url['path']) {
		case '/index.html' :
		case '/' :
			$page['name'] = 'home';
			break;
		case '/guestbook.html' :
			$page['name'] = 'guestbook';
			break;
		case '/contact.html' :
			$page['name'] = 'contact';
			break;
		default:
			$page['name'] = 'error';
	}
	
	$pageFile = PAGES_PATH . DIRECTORY_SEPARATOR . $page['name'] . '.php';
	
	if(!file_exists($pageFile)){
		$page['name'] = 'error';
	}
	*/
	/*
	//Solution Professionnelle
	//Pour les solutions d'URL du genre:
	 * http:// FQDN /page/var1/value1/var2/value2/....
	 */
	
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
	
	/*
	//Solution Personnelle
	 * http:// FQDN / var1 / var2 / ... / varN / page
	 * 
	 *
	$url = $_SERVER['REQUEST_URI'];
	$uri = parse_url($url);
	parse_str(@$url['query'], $params);
	$page['params'] = $params;
	$urlParts = explode('/' , trim( $uri['path'] , '/' ));
	
	$nbParams = count($urlParts)-1;
	$varPage = explode(".", $urlParts[$nbParams]); 
	$page['name'] = $varPage[0];
	for($i=0,$i<$nbParams,$i++){
		
	}
	
	(page['name'] == 'index' || page['name'] == '')?$page['name']='home':;
	$pageFile = PAGES_PATH . DIRECTORY_SEPARATOR . $varPage . '.php';
	if(!file_exists($pageFile)){
		$page['name'] = 'error';
	}
	*/
	$pageFile = PAGES_PATH . DIRECTORY_SEPARATOR . $page['name'] . '.php';
	
	if(!file_exists($pageFile)){
		$page['name'] = 'error';
	}
	return $page;
	
}