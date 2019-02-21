<?php

//Restrict calling start.php directly from browser #1315
if(!defined("DEVELOP_ALLOW_SYSTEM_START")){
	header("HTTP/1.0 404 Not Found");	
	exit;
}
global $Develop;
if (!isset($Develop)) {
    $Develop = new stdClass;
}

require_once dirname(dirname(__FILE__)) . "/system/twig/TwigAutoloader.php";

$Develop->loader = new \Twig\Loader\FilesystemLoader('templates');
$Develop->twig = new \Twig\Environment($Develop->loader, [
    'cache' => 'cache',
    'debug' => true,
]);



include_once(dirname(dirname(__FILE__)) . '/libraries/develop.lib.route.php');


/**
 * Installation test to first use
 */
if (!is_file(develop_route()->configs . 'develop.config.site.php') && !is_file(develop_route()->configs . 'develop.config.db.php')) {
    header("Location: installation");
	exit;
}


include_once(develop_route()->configs . 'libraries.php');
include_once(develop_route()->configs . 'classes.php');

include_once(develop_route()->configs . 'develop.config.site.php');
include_once(develop_route()->configs . 'develop.config.db.php');



//Load session start after classes #1318
session_start();
foreach ($Develop->libraries as $lib) {
    if (!include_once(develop_route()->libs . "develop.lib.{$lib}.php")) {
        throw new exception('Cannot include all libraries');
    }
}



