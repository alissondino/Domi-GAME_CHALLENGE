<?php 
$conn = new PDO("mysql:host=localhost;dbname=dbdomi_challenge","root","");

$stmt = $conn->prepare("UPDATE tb_users SET name_user=:NAME,last_name_user=:LAST_NAME,birth_date_user=:DATE_BIRTH,email_user=:EMAIL,login_user=:LOGIN,password_user=:PASSWORD,last_update=:L_UPDATE WHERE id_user = :ID"); 

$id = 2; 
$name = 'Antonio';
$last_name = 'Puto';
$date_birth = '2003-05-27';
$email = 'putonho@gmail.com';
$login = 'putonho';
$password = '59875';
$l_update = date("Y-m-d H:i:s");

$stmt -> bindParam(":ID",$id);
$stmt -> bindParam(":NAME",$name);
$stmt -> bindParam(":LAST_NAME",$last_name);
$stmt -> bindParam(":DATE_BIRTH",$date_birth);
$stmt -> bindParam(":EMAIL",$email);
$stmt -> bindParam(":LOGIN",$login);
$stmt -> bindParam(":PASSWORD",$password);
$stmt -> bindParam(":L_UPDATE",$l_update);


$stmt ->execute();

$stmt = $conn -> prepare("SELECT * FROM tb_users ORDER BY name_user");

$stmt -> execute();

$results = $stmt -> fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $row) {
	foreach ($row as $key => $value) {
		echo "<b>".$key.":</b>".$value."<br/>";
	}
	echo "================================================<br/>";
}
 ?>