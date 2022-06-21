<?php 
	session_start(); 
 
  require '../header.php'; 
  require 'menu.php'; 
	require 'connect.php'; 
 
if (isset($_SESSION['customer'])) {
	
	$sql=$pdo->prepare(
		'DELETE from favorite 
		 where customer_id=? 
		 and product_id=?'
	);
	$sql->execute([$_SESSION['customer']['id'], $_REQUEST['id']]);
	
	echo 'お気に入りから商品を削除しました。';
	echo '<hr>';
	
} else {
	echo 'お気に入りから商品を削除するには、ログインしてください。';
}
require 'favorite.php';
?>
<?php require '../footer.php'; ?>
