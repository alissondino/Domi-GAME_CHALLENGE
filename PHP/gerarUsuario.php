<?php

require_once("Usuario.php");
require_once("geradorDeUsuarios.php");



$criaUsuario = new geradorDeUsuarios(); 

$criaUsuario->comUser("Alisson");
$criaUsuario->comPass("123456");
$criaUsuario->comName("Alisson Gabriel Dino Costa");
$criaUsuario->comEmail("alisson_dina@estudante.sc.senai.br");
$criaUsuario->comDateBirth("1999-03-30");
$criaUsuario->comLvlUser("jogador");



echo "<pre>";

?>