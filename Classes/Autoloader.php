<?php

class Autoloader {
	static function autoload($className) {
		$fileName = str_replace('\\', DIRECTORY_SEPARATOR, $className);
		$fileName = str_replace('_' , DIRECTORY_SEPARATOR, $fileName);
		$fileName = 'Classes/' . $fileName . '.php';
		if(file_exists($fileName)) {
			require(dirname(dirname(__FILE__)) . '/' . $fileName);
		}
	}
	static function register() {
		spl_autoload_register(__NAMESPACE__ .'\\' . __CLASS__ . '::autoload');
	}
}
Autoloader::register();