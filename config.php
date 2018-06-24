<?php

spl_autoload_register(function ($pClassName) {
	$filepath = __DIR__ . DIRECTORY_SEPARATOR . $pClassName . ".php";
	if(file_exists($filepath)){
		include($filepath);
	}
});

spl_autoload_register(function($pClassName){
	$filepath = __DIR__. DIRECTORY_SEPARATOR ."PHP". DIRECTORY_SEPARATOR ."classes". DIRECTORY_SEPARATOR.$pClassName.".php";
	if(file_exists($filepath)){
		include($filepath);
	}	
});


?>