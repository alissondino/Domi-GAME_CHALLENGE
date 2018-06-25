<?php 
$conn = new PDO("mysql:host=localhost;dbname=dbdomi_challenge","root","");

$stmt = $conn->prepare("INSERT INTO tb_users(name_user,last_name_user,birth_date_user,email_user,login_user,password_user,last_update)
	VALUES(:NAME,:LAST_NAME,:DATE_BIRTH,:EMAIL,:LOGIN,:PASSWORD,:L_UPDATE)");
 
$name = 'Tereza';
$last_name = 'Santos';
$date_birth = '1998-10-22';
$email = 'tereza.santos@gmail.com.br';
$login = 'Dina';
$password = 'lala123lala';
$l_update = date("Y-m-d H:i:s");

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