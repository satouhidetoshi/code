<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel ="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
<style>
	ul.row {list-style: none;}
	img {width: 100%;height: auto;}
	button {border: none}
	li.product { padding: 19px;}

	a{color: #999; text-decoration: none}
	.pg { border: solid 1px;  padding: 0 6px; }
	.pg.active{background-color: #09aaf3;color: #fff;}
</style>


<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php require 'connect.php'; ?>
<div class="result"></div>



<form action="product.php" method="post">
商品検索
	<input type="text" name="keyword">
	<input type="submit" value="検索">
</form>
<hr>
<article class="container">
	<button class="fas fa-th-large" style="color: #09aaf3;font-size: 2em;"></button>
	<button class="fas fa-list" style="font-size: 2em;"></button>

	<ul class="row">
<?php
$item_count = 6 ; //1pに6商品

if(isset($_REQUEST['page'])){
	$current_page = ($_REQUEST['page'] - 1) * $item_count ;
}else{
	$current_page = 0 ;
}


// 商品一覧のページ
if (isset($_REQUEST['keyword'])) {
	//検索条件が来てたらこっち
	$sql=$pdo->prepare('select * from product where name like ?');
	$sql->execute(['%'.$_REQUEST['keyword'].'%']);

} else {
	// 無条件ならこっち
	$sql=$pdo->prepare(
			"SELECT * from product LIMIT ? , $item_count"
	);
	$sql->execute([$current_page]);
}

foreach ($sql as $row) {
	$id=$row['id'];
?>
	<li class="product col-4" >
	<?php 
	// ここでファイルの存在を調べる image/3.jpg あれば表示する
	if( file_exists("image/$row[id].jpg")){
?>
		<img class="" src="image/<?=$id?>.jpg">
<?php
	} 

	if( !empty($row['images'])){
		$product_imgs = unserialize($row['images']);
		
?>		
			<img src="../chapter6/<?=$product_imgs[0]?>" alt=""
					style="width:200px;height:auto">
<?php	}?>

	<p>
			<a href="detail.php?id=<?=$id?>">
				<span><?=$row['name']?></span>
				<br><span><?=$row['price']?></span>
			</a>	
		</p>

	</li>

<?php } ?>  
</ul>
<!-- ページャーをつけてみる -->
<?php
		$sql =	$pdo->query( 
			"SELECT count(*) as ct FROM product");

				// 最初の1行だけ取り出す
		$count = $sql->fetch() ; // → 14

				//1ページの件数で割って切り上げる
		$count = ceil($count['ct'] / $item_count); // → 3
				// 1から始めた方が効率がいい
		for( $i=1 ;$i <= $count ; $i++ ){
?>

 	<!-- <a class="pg" href="./?page=1">1</a> -->
 	<a class="pg" href="./?page=<?= $i ?>"><?= $i ?></a>
<?php } ?>

</article>


<script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script> 
<script>
	$('.fa-list').click(function(){
		$(this).css('color','#09aaf3').prev().css('color','#000');
	  $('li.product').addClass('row').removeClass('col-4');
		$('li.product img').addClass('col-3');
		$('li.product img + p').addClass('col-9');
	
	});

	$('.fa-th-large').click(function(){
		$(this).css('color','#09aaf3').next().css('color','#000');
		$('li.product').addClass('col-4').removeClass('row');
		$('li.product img').removeClass('col-3');
		$('li.product img + p').removeClass('col-9');
	});
	
	
	/*
	 URLのパラメータ（クエリ文字列）の特定のキーの値を取得する関数
	 */
	function getParam(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
	}


	$(function(){
		$.ajax({
			url: '/04_js/slider/top.html',
			/* スライダーのフルパス */
					dataType: 'html', //受け取るデータの型
			}).done(function(res){
					/* 通信成功時 */
					$('.result').html(res); //取得したHTMLを.resultに反映
			})/*.fail(function(res){
					  通信失敗時 
					alert('通信失敗！');*/
			});

		/*
		page active class add
			未定義 = undefined
			値にnullが入るのはnullが代入されてるから 
		*/

		//console.log( getParam('page') ); //null
		let page_num = getParam('page') !== null ? getParam('page')-1 : 0 ;
		$('.pg').eq(page_num).addClass('active');
});
</script>

<?php
 require '../footer.php'; ?>
