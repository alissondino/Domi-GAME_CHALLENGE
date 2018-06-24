<?php 

require_once("vendor/autoload.php");   

$app = new \Slim\Slim();
use Rain\Tpl;

// $app->get('/',function(){
// 	echo "HOME PAGE";
// });
// $app->run();

// config
$config = array(
	"tpl_dir"       => "tpl/",
	"cache_dir"     => "cache/"
);
Tpl::configure( $config ); 
// create the Tpl object
$tpl = new Tpl;
// assign a variable
$tpl->assign( "nome", "Alisson Gabriel" );
$tpl->assign( "idade", "19" );

// assign an array
// $tpl->assign( "week", array( "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday" ) );
// draw the template
$tpl->draw( "conteudo");
?>





