<?php
/**
 * Template Name: Blog Page
 *
 */
get_header(); 
$kaya_options = get_option('kayapati');
//Blog Page Options Left / Right / Fullwidth
   $blog_page_categories = get_theme_mod('blog_page_categories') ? get_theme_mod('blog_page_categories') :'';
	$blog_page_options = get_theme_mod('blog_page_sidebar') ? get_theme_mod('blog_page_sidebar') : 'two_third';
	$sidebar_class=( $blog_page_options == 'two_third' ) ? 'one_third_last' : 'one_third';
	$sidebar_border_class=( $blog_page_options == 'two_third' ) ? 'right_sidebar' : 'left_sidebar';
?>
	<!--Start Middle Section  -->
	<section id="mid_container_wrapper">
	<section id="mid_container" class="container">
		<section class="<?php echo $blog_page_options; ?>" id="content_section">
			<?php
			if(  $blog_page_categories  ){
				$blog_page =@implode(",", $blog_page_categories);
			}else{
				$blog_page = '';
			}
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			query_posts("cat=$blog_page.&paged=$paged"); 
			/* 
			* called loop.php and that will be used instead.
			*/
			get_template_part( 'loop');
			wp_reset_query();
			?>
        </section>
        <?php // Sidebar Section
		if( $blog_page_options != 'fullwidth' ) :	?>
			<article class="<?php echo $sidebar_class. ' ' . $sidebar_border_class; ?>" >
				<?php get_sidebar();?>
			</article>
			<?php endif; ?>
			<div class="clear"></div>
	<?php get_footer(); ?>