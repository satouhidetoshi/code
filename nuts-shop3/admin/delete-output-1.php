<?php include_once '../header.php'; ?>
<?php
 require '../chapter6/connect.php'; 

$sql=$pdo->prepare('delete from product where id=?');
if ($sql->execute([$_REQUEST['id']])) {
	echo '削除に成功しました。';
} else {
	echo '削除に失敗しました。';
}
?>


</main>  
</div>
<?php require '../footer.php'; ?>
	