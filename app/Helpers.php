<?php

/**
* creer le lien css du dashboard ADMIN en ligne
* @param $url_css string : lien du fichier en local
* format : lib/bootstrap (bootstrap.css)
*/
//http://dev2.investirenaustralie.com
if ( ! function_exists('helper_css'))
{
    function helper_css($url_css)
	{
	  return '<link href="'. asset('assets/css/'. $url_css .'.css').'" rel="stylesheet">' ;
	}
}
/**
* creer le lien image vers le dashboard ADMIN en ligne
* @param $url_img string : lien de l'image en local
*/
if( ! function_exists('link_img'))
{
	function link_img($url_img)
	{
		return asset($url_img) ;
	}
}
/**
* creer le lien javascript vers le dashboard ADMIN en ligne
* @param $url_js string : lien de l'image en local
* format : assets/js/lib/jquery.js ou assets/plugins/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.min.js
*/

if( ! function_exists('helper_js'))
{
	function helper_js($url_js)
	{
		return '<script src="'. asset($url_js.'.js').'"></script>';
	}
}
/**
* creer le lien css plugin vers le frontEnd en ligne
* @param $url_css string : lien du css/plugin en local
* format : plugins/slick-nav/slicknav
*/
if( ! function_exists('plugin_css'))
{
	function plugin_css($plugin_css)
	{
		return '<link href="'. asset($plugin_css .'.css').'" rel="stylesheet">';
	}
}
/**
* path vers dossier resources laravel
* @param null
* @return string $resources_path
*/
if( ! function_exists('resources_path'))
{
	function resources_path()
	{
		return base_path() . '/resources/';
	}
}
/**
*chargement des fichiers xml_loader_files
* @param Route Xml
* @return Array Xml
*/
if( ! function_exists('xml_loader_files') )
{
	function xml_loader_files($xml_name)
	{
		$xml_routes = resources_path().'/xml/'.$xml_name.'.xml';

		if(File::exists($xml_routes))
		{
			$xml = simplexml_load_file($xml_routes);
			return $xml;
		}
		else
		{
			echo "Fichier xml non trouvé";
		}
	}
}

/**
* Helpers Pagination bootstrap boo-admin
* @param Object LengthAwarePaginator
* @return view : pagination-admin
*/

if( ! function_exists('paginationAdmin') )
{
	function paginationAdmin($lengthAwarePaginator)
	{
		return view('admin.pagination-admin',compact('lengthAwarePaginator'));
	}
}

/**
* Helpers affichage Image Publicite
* @param string $nom_image
* @return string url image publicite
*/
if( ! function_exists('pub') )
{
	function pub($nom_image)
	{
		return asset('admin/img/publicite/' . $nom_image );
	}
}


/**
* Helpers fichier de configuation Social Media
* @param string $key , string $default
* @return Array
*/
if( ! function_exists('social'))
{
	function social($key=null, $default=null)
	{
		$xml = xml_loader_files('config');
		$instance = $xml->socialmedia;
    	$xml_media = json_decode(json_encode($instance),true);

    	if( is_null($key))
    		return $xml_media;

    	if( !is_null($key) && is_null($default) )
    	{
    		$indice = explode('.',$key);
    		return $xml_media[$indice[0]][$indice[1]];

    	}
    	if( !is_null($key) && !is_null($default) )
    	{
    		$indice = explode('.',$key);
    		$instance->$indice[0]->$indice[1] = $default;

    		$xml->saveXML(public_path().'/xml/config.xml');
    		return $xml_media[$indice[0]][$indice[1]];
    	}
	}
}

/**
* Fonction qui recupere les doublons
* @param array
* @return array
*/
if( ! function_exists('array_doublon') )
{
	function array_doublon($array)
	{
	    if (!is_array($array))
	    {
	    	return false;
	    }
	    $r_valeur = Array();

	    $array_unique = array_unique($array);

	    if ( count($array) - count($array_unique) )
	    {
	        for ( $i=0; $i<count($array); $i++ )
	        {
	            if (!array_key_exists($i, $array_unique))
	            {
	            	 $r_valeur[] = $array[$i];
	            }

	        }
    	}
    	return $r_valeur;
	}


	/**
	* fonction verifier si un Object est vide
	* @param Object
	* @return boolean true or false
	*/
	if( ! function_exists('array_is_empty') )
	{
		function array_is_empty($object)
		{
			if( count($object) == 0 )
				return true;
			elseif( count($object) != 0 )
			{
				for ($i=0; $i < count($object) ; $i++) {
					if( !isset($object[$i]) )
						return true;
					else{
						if( is_array($object[$i]) || is_object($object[$i]) )
							return false;
						else
							return true;
					}
				}
			}

		}
	}


  /**
  * fonction get configuration favicon du site
  * @param object
  * @return string
  */

  if( ! function_exists('favicon') )
  {
      function favicon()
      {
          return App\Configsite::favicon();
      }
  }

}
