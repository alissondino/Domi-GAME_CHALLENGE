<?php 
$conn = new PDO("mysql:host=localhost;dbname=dbdomi_challenge","root","");

$id = 3; 

$stmt = $conn->prepare("DELETE FROM  tb_users WHERE id_user = :ID"); 

$stmt -> bindParam(":ID",$id);

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