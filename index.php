<?php 
session_start();

spl_autoload_register(function($class){
	if(file_exists('Controllers/'.$class.'.php')){
		require 'Controllers/'.$class.'.php';
	} else if(file_exists('Models/'.$class.'.php')){
		require 'Models/'.$class.'.php';
	} else if(file_exists('Core/'.$class.'.php')){
		require 'Core/'.$class.'.php';
	}else if(file_exists('Support/'.$class.'.php')){
		require 'Support/'.$class.'.php';
	}
});

require 'Support/Config.php';

$core = new Core();
$core->run();
?>