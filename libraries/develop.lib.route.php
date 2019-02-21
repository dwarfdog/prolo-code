<?php

/**
 * Develop Convert arrays to Object
 *
 * @param array $array Arrays
 * @param string $class class name ,else it will be object of stdClass
 *
 * @return object
 */
function arrayObject($array, $class = 'stdClass') {
		$object = new $class;
		if(empty($array)) {
				return false;
		}
		foreach($array as $key => $value) {
				if(strlen($key)) {
						if(is_array($value)) {
								$object->{$key} = arrayObject($value, $class);
						} else {
								$object->{$key} = $value;
						}
				}
		}
		return $object;
}

/**
 * Force Object
 * Sometimes php can't get object class ,
 * so we need to make sure that object have class name
 *
 * @param object $object Object
 *
 * @return object
 */
function forceObject(&$object) {
		if(!is_object($object) && gettype($object) == 'object')
				return ($object = unserialize(serialize($object)));
		return $object;
}

/**
 * Get system directory paths
 *
 * @return object
 */
function develop_route() {
		$root     = str_replace("\\", "/", dirname(dirname(__FILE__)));
		$defaults = array(
				'www' => "$root/",
				'libs' => "$root/libraries/",
				'classes' => "$root/classes/",
				'actions' => "$root/actions/",
				'locale' => "$root/locale/",
				'sys' => "$root/system/",
				'configs' => "$root/configurations/",
				'themes' => "$root/themes/",
				'pages' => "$root/pages/",
				'com' => "$root/components/",
				'admin' => "$root/admin/",
				'forms' => "$root/forms/",
				'upgrade' => "$root/upgrade/",
				'cache' => "{$root}/cache/",
				'js' => "$root/javascripts/",
				'system' => "$root/system/",
				'components' => "$root/components",
				'templates' => "$root/templates"
		);
		return arrayObject($defaults);
}

/**
 * Get current url
 *
 * @param string  $uport Want port or not? default will be disable
 *
 * @return object
 */
function current_url($uport = '') {
		$protocol = 'http';
		$uri      = $_SERVER['REQUEST_URI'];
		if($uport == true) {
				$uri = substr($uri, 0, $uri);
		}
		if(!empty($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
				$protocol = 'https';
		}
		$port = ':' . $_SERVER["SERVER_PORT"];
		if($port == ':80' || $port == ':443') {
				if($uport == true) {
						$port = '';
				}
		}
		$url = "$protocol://{$_SERVER['SERVER_NAME']}$port{$uri}";
		return $url;
}
/**
 * Register a class for autoloading 
 *
 * @param array $classes A classes list with the path
 * 
 * @return void
 */
function develop_register_class(array $classes = array()) {
		global $Develop;
		foreach($classes as $name => $class) {
				if(!empty($name) && file_exists($class)) {
						$Develop->classes[$name] = $class;
				} else {
						throw new Exception("Unable to register a class `{$name}` with non-existing physical class file at location `{$class}`");
				}
		}
}
/**
 * Auto loading classes
 *
 * @param string $name of the class
 * 
 * @return void
 */

function develop_autoload_classes($class = ''){
	global $Develop;
	if(isset($Develop->classes[$class]) && file_exists($Develop->classes[$class])) {
			require_once($Develop->classes[$class]);
			return;
	}
}


/**
 * Unregister a class 
 * Unregistering the system classes may result in strange behaviour 
 * 
 * @param array $classes A classes list with the path
 * 
 * @return void
 */
function develop_unregister_class($name = ''){
		global $Develop;
		if(isset($Develop->classes[$name])) {
				unset($Develop->classes[$name]);
		}	
}
spl_autoload_register('develop_autoload_classes');
