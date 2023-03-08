<?php get_header();  ?>
	<!--  <div class="sub_header_wrapper"> Sub Header Section
		<div class="sub_header container">
			<h2> <?php //_e( 'Error 404 - Not Found', 'cooks' ); ?> </h2>
		</div>
	</div>End Sub Header Section -->
<!--Start Middle Section  -->
	<section id="mid_container_wrapper">
		<section id="mid_container" class="container"> 
			<!-- Page Titles -->
			<div id="inner_title">
				<h2>W-P-L-O-C-K-E-R-.-C-O-M
					<?php _e( 'Error 404 - Page Not Found', 'cooks' ); ?>
				</h2>
			</div>
        <!-- End Page Titles -->	
			<div class="one_half">
				<?php _e( ' <h3>Archives by Subject:</h3>', 'cooks' ); ?>
				<ul>
					<?php wp_list_categories('&title_li='); ?>
				</ul>
			</div>
			<div class="one_half_last">
				<?php _e( ' <h3>Archives by Month::</h3>', 'cooks' ); ?>
				<ol>
					<?php wp_get_archives('type=monthly'); 
					next_posts_link() 
					?>
				</ol>
			</div>
    <!-- Footer  -->
<?php get_footer(); ?>