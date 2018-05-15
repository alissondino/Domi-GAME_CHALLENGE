<?php

require_once("Usuario.php");
require_once("UserBuilder.php");



$buildingUser = new UserBuilder(); 

$buildingUser->comUser("Alisson");
$buildingUser->comPass("123456");
$buildingUser->comName("Alisson Gabriel Dino Costa");
$buildingUser->comEmail("alisson_dina@estudante.sc.senai.br");
$buildingUser->comDateBirth('1999-03-30');
$buildingUser->comLvlUser("jogador");

$usuario = $buildingUser->build();
echo "<pre>";
var_dump($usuario);
// $usuarioNovo = $geradorDeUsuarios->gerar();

?>