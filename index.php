<?php get_header(); 
 $kaya_options = get_option('kayapati');
//Blog Page Options Left / Right / Fullwidth
	$blog_page_options = get_theme_mod('blog_page_sidebar') ? get_theme_mod('blog_page_sidebar') : 'two_third';
	$sidebar_class=( $blog_page_options == 'two_third' ) ? 'one_third_last' : 'one_third';
	$sidebar_border_class=( $blog_page_options == 'two_third' ) ? 'right_sidebar' : 'left_sidebar';
?>
	<!--Start Mid Container -->
	<section id="mid_container_wrapper">
		<section id="mid_container" class="container">
			<div class="<?php echo $blog_page_options; ?>" id="content_section">
				<?php if ( have_posts() ) :
						$blog_options=get_theme_mod('blog_page_categories') ? get_theme_mod('blog_page_categories') :'';
						if($blog_options){
							$blogpages =@implode(' , ',$blog_options);
						}else{
							$blogpages='';
						}
						$paged = (get_query_var('paged')) ? get_query_var('paged') :1;
						query_posts("cat=$blogpages.&paged=$paged"); 
						locate_template('loop.php',true); // called loop-blog.php 
					else : ?>
						<article>
						<?php if ( current_user_can( 'edit_posts' ) ) :
							// Show a different message to a logged-in user who can add posts.		?>
								<h1 class="entry-title"><?php _e( 'No posts to display', '' ); ?></h1>
								<p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', '' ), admin_url( 'post-new.php' ) ); ?></p>
							<?php else :
							// Show the default message to everyone else. ?>
								<h1 class="entry-title"><?php _e( 'Nothing Found', '' ); ?></h1>
								<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', '' ); ?></p>
							<?php endif; // end current_user_can() check ?>
						</article>
				<?php endif; // end have_posts() check ?>
			</div>	
        <?php // Sidebar Section
		if( $blog_page_options != 'fullwidth' ) :	?>
			<aside class="<?php echo $sidebar_class . ' '. $sidebar_border_class; ?>"> <!--Start Sidebar Section -->
					<?php get_sidebar(); ?>	
				</aside> <!--End Sidebar Section -->
			<?php endif; ?>
			<div class="clear"></div>
	<?php get_footer(); ?>                                            