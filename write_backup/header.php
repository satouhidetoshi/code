<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Write
 */

$uri = get_template_directory_uri(); // themes/write
$dir = get_template_directory();

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php write_site_title(); ?>



<div id="video_wrap" class="overflow-hidden">
		<div id="video" class="boxSizing">
			<div class="videoside_img left"><img src="<?=$uri?>/images/tasakiichiba_left.jpg" alt=""></div>

				<video autoplay="autoplay" muted="muted" loop="loop" poster="<?=$uri?>/images/tasakiichiba.jpg">
					<source src="<?=$uri?>/images/tasakiichiba.mp4" type="video/mp4">
					<img src="<?=$uri?>/images/tasakiichiba.jpg" alt="">
				</video>

				<div class="videoside_img right"><img src="<?=$uri?>/images/tasakiichiba_right.jpg" alt=""></div>

			
			


			<div class="bottom_img" >
				<img src="<?=$uri?>/images/video_bg.png" alt="">
			</div>
		</div><!--/#video-->
	<!-- </div> -->

</div>		


<div id="page" class="hfeed site" >
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'write' ); ?></a>

	<header id="masthead" class="site-header"style="position:sticky;top:20px;">

		<div class="site-top">
			<div class="site-top-table">
				

				<?php if ( ! get_theme_mod( 'write_hide_navigation' ) ) : ?>
				<nav id="site-navigation" class="main-navigation">

				<!--<div class="bottom_logo" >
				<img src="<?=$uri?>/images/logo1.png" alt="">
			</div>-->

					<button class="drawer-toggle drawer-hamburger">
						<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'write' ); ?></span>
						<span class="drawer-hamburger-icon"></span>
					</button>
					<div class="drawer-nav">
						<div class="drawer-content">
							<div class="drawer-content-inner">
							<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
							<?php if ( ! get_theme_mod( 'write_hide_search' ) ) : ?>
							<?php get_search_form(); ?>
							<?php endif; ?>
							</div><!-- .drawer-content-inner -->
						</div><!-- .drawer-content -->
					</div><!-- .drawer-nav -->
				</nav><!-- #site-navigation -->
				<?php endif; ?>
			</div><!-- .site-top-table -->
		</div><!-- .site-top -->

		<?php if ( ( get_header_image() && 'site' == get_theme_mod( 'write_header_display' ) ) ||
		           ( get_header_image() && 'page' == get_theme_mod( 'write_header_display' ) && is_page() ) ||
		           ( get_header_image() && 'page' != get_theme_mod( 'write_header_display' ) && is_home() ) ) : ?>
		<div id="header-image" class="header-image">
			<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
		</div><!-- #header-image -->
		<?php endif; ?>

		<?php if ( ( get_theme_mod( 'write_home_text' ) && 'site' == get_theme_mod( 'write_home_text_display' ) ) ||
		           ( get_theme_mod( 'write_home_text' ) && 'front' == get_theme_mod( 'write_home_text_display' ) && is_front_page() && ! is_home() ) ||
		           ( get_theme_mod( 'write_home_text' ) && 'front' != get_theme_mod( 'write_home_text_display' ) && is_home() && ! is_paged() ) ) : ?>
		<div class="home-text">
			<?php echo wp_kses_post( get_theme_mod( 'write_home_text' ) ); ?>
		</div><!-- .home-text -->
		<?php endif; ?>


<script>


jQuery(function($){
	var h;
	$(document).on('scroll',function(){
		h=$(window).scrollTop();
		console.log(h);
		if(h > 450){
			vertical('sp');
		}else{
			vertical('pc')
		}
	})

	function vertical(dv){
		$('#menu-nagasaki li').eq(0).find('img').attr('src',`<?=$uri?>/images/nav_shoplist_${dv}.png`)
		$('#menu-nagasaki li').eq(1).find('img').attr('src',`<?=$uri?>/images/nav_partner_${dv}.png`)
		$('#menu-nagasaki li').eq(2).find('img').attr('src',`<?=$uri?>/images/nav_miryoku_${dv}.png`)
	
		$('#menu-nagasaki li').eq(4).find('img').attr('src',`<?=$uri?>/images/nav_event_${dv}.png`)
		$('#menu-nagasaki li').eq(5).find('img').attr('src',`<?=$uri?>/images/nav_blog_${dv}.png`)
		$('#menu-nagasaki li').eq(6).find('img').attr('src',`<?=$uri?>/images/nav_access_${dv}.png`)
	}
})
</script>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script>
 var startPos = 0, winScrollTop = 0;
$(window).on('scroll', function () {
    winScrollTop = $(this).scrollTop();
    if (winScrollTop >= startPos) {
        $('.search-form').addClass('hide');
    } else {
        $('.search-form').removeClass('hide');
    }
    startPos = winScrollTop;
});

</script>














	</header><!-- #masthead -->

	<div id="content" class="site-content">