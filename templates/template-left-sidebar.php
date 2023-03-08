<?php
/*
Template Name: Page with Left Sidebar
*/
get_header();
?>
<section id="mid_container_wrapper">
		<section id="mid_container" class="container">
			<section class="" id="content_section">
				<?php 
				if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-content">
							<?php the_content(); ?>
						</div>
					</div>
				<!-- #post-## -->
				<?php endwhile; ?>
			</section>			
<?php  get_footer(); ?>			