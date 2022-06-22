<?php
/* TOPのテンプレート
 */

$uri = get_template_directory_uri(); // themes/write
get_header(); ?>

<main id="main" class="site-main">

  <?php
$args = array(
  'post_type' => 'parts',
  'post__in' => array(),
  'category_name' =>'nagasaki',
  'post_status' => array('publish'),
  'order'=> 'asc',
  'orderby'=> 'post_date'
  
);
$query = new WP_Query($args);
?>

  <div id="block" class='clearfix'>

    <?php
if($query->have_posts()):
  while($query->have_posts()):
    $query->the_post(); ?>

    <article class="block-post first">




      <!-- 投稿タイトル -->
      <h2 class="title">
        <img src="image/blockpost.png" alt="ながさき市場ってどんなとこ?">
      </h2>
      <p class="text-xsm"><?php the_field('setumei') ?></strong></p>
      <p class="morebtn">
        <img src="image/moretext.png" alt="詳しくみる">
      </p>

    </article>


    <?php 
  endwhile;
  else:
  echo '投稿はありません';
  endif;
  wp_reset_postdata();

   ?>
  </div>

</main>





<sub id="sub" class="site-sub">

  <?php
echo "<h2 class='text-center'><img src='$uri/images/new_info.png' alt='更新情報'></h2>";

$args = array(
  'post_type' => 'parts',
  'post__in' => array(),
  'category_name' =>'nagasaki2',
  'post_status' => array('publish'),
  'order'=> 'asc',
  'orderby'=> 'post_date'
  
);
$query = new WP_Query($args);
?>

  <div id="block" class='clearfix'>

    <?php
if($query->have_posts()):
  while($query->have_posts()):
    $query->the_post(); ?>



    <article class="block-post-second">

      <!-- 投稿タイトル -->
      <h2 class="title">
        <img src="image/blockpost.png" alt="ながさき市場ってどんなとこ?">
      </h2>
      <p class="text-xsm"><?php the_field('setumei') ?></strong></p>


    </article>


    <?php 
  endwhile;
  else:
  echo '投稿はありません';
  endif;
  wp_reset_postdata();

   ?>
  </div>

</sub>


<div class="sec-news">

  <?php
//お知らせ
echo "<h2 class='text-center'><img src='$uri/images/news_title.png' alt='お知らせ'></h2>
	<section class='line'>";
$args = array(
	'post_type' => 'parts', 
	'cat' => 14,
	'posts_per_page' => 5,
	'order' => 'DESC',  
);

$the_query = new WP_Query($args);
	while ($the_query->have_posts()) : $the_query->the_post();
		?>
  <ul class="sec-news-list">

    <?php
	//更新日
		the_modified_date('Y/m/d');
		the_title();
		echo "<br>";
?>
  </ul>

  <?php



	endwhile;
wp_reset_postdata();
 
echo '</section> ';?>


  <div id="container-sidebar" class="container-sidebar" style="display:flex">

    <div class="calender">
      <?php
  echo do_shortcode('[eo_fullcalendar]'); 
?>
    </div>

    <div class="mail-magazin">
      <figure>
        <?php
  echo "<img   src='$uri/images/merumaga-title.png' alt='メールマガジン'>";?>
        <br>
        <figcaption>
          <input type="email" name="mail">
          <button type="submit" class='c-button'>登録する</button>
        </figcaption>
        </figre>
        <figre>
          <?php
  echo "<img src='$uri/images/calendar2021-bn@2x.png' alt='カレンダー2021'>";
  echo "<img src='$uri/images/calendar2022-bn@2x.png' alt='カレンダー2022'>";?>

      </figure>


    </div>


  </div>

</div>








<?php get_footer(); ?>