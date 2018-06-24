<?php 

$conn = new PDO("mysql:dbname=dbdomi_challenge;host=localhost","root","");

$stmt = $conn -> prepare("SELECT * FROM tb_users ORDER BY name_user");

$stmt -> execute();

$results = $stmt -> fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $row) {
	foreach ($row as $key => $value) {
		echo "<b>".$key.":</b>".$value."<br/>";
	}
	echo "================================================<br/>";
}
// echo json_encode($results);

?>
