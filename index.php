<?php 
require_once("config.php");

// Teste de impressão de dados de um usuário em específico
// $root = new User();
// $root -> loadById(2);
// // echo $root;

//Teste de impressão de todos os registros de uma tabela


//Testando o método que faz a busca por um usuário da tabela tb_users por um login e retorna uma lista com os logins mais próximos informados
// $search = User::searchList("di");
// echo json_encode($search);


//Testando a validação de um usuário com o metódo validateLogin
// $TryLogin = new User();
// $TryLogin -> validateLogin("putonho","59");
// echo $TryLogin;


//Testando a criação de um novo usuário com este método pois envolvem regras do negócio.
$newUser = new User("Gabriel","Chuler",'2002-11-03',"chulinho_crei_crei@gmail.com","chulis","chulischullis12",date("Y-m-d H:i:s"));
$newUser->insertUser();


$AllUsers = User::getList();
echo json_encode($AllUsers);
?>