<?php require '../header.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 
	'staff', 'password');

$sql = 'select * from product';
$stmt = $pdo->query($sql);
var_dump($stmt);

foreach ( $stmt as $row) {
	echo '<p>';
	echo $row['id'], ':';
	echo $row['name'], ':';
	echo $row['price'];
	echo '</p>';
}
?>
<?php require '../footer.php'; ?>
