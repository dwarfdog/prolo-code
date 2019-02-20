<?php

/**
 * Examples of class in app
 */
$DevelopClasses = array(
		'Session',
);
foreach($DevelopClasses as $class){
		$loadClass['Develop'.$class] = develop_route()->classes . "Develop{$class}.php";
}
develop_register_class($loadClass);
