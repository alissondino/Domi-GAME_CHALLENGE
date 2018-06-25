<?php 
require_once("config.php");

// Teste de impressão de dados de um usuário em específico
// $root = new User();
// $root -> loadById(2);
// // echo $root;

//Teste de impressão de todos os registros de uma tabela
$AllUsers = User::getList();
echo json_encode($AllUsers);
?>