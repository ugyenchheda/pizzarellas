<?php $options=get_option('kayapati'); ?>
<footer id="bottom_footer">
		<!-- Start Footer bottom section -->
	<?php $most_footer_disable=get_theme_mod('most_footer_disable') ? get_theme_mod('most_footer_disable') : '0'; 
	if($most_footer_disable == "0"){ ?> 
		<div id="footer_bottom"  class="most_footer_bottom">
			<?php $footer_contact_info = get_theme_mod('footer_col1_section') ? do_shortcode( get_theme_mod('footer_col1_section') ) : '<span>Call Us :  812 - 254 - 8521</span> <span>Email Us :  cooks@gmail.com</span>'; 
			if( $footer_contact_info ): ?>
			<div class="one_third" id="footer_column1">
				<?php echo $footer_contact_info; ?>
			</div>
		<?php endif; ?>
			<div class="one_third" id="footer_column2" > 
		       <?php if( has_nav_menu( 'footer' ) ){
				   wp_nav_menu( array( 'container_class' => 'menu-footer', 'theme_location' => 'footer' , 'menu_class' => '') );
                   }
                   ?>
        <?php 
			echo '<span class="copyrights">';
               	echo get_theme_mod('footer_col2_section') ? do_shortcode( get_theme_mod('footer_col2_section') ) :'Copyright &copy; Kayapati. All rights reserved.';
            echo '</span>';
       	?>
			</div>
			<?php $footer_social_icons = get_theme_mod('footer_col3_section') ? do_shortcode( get_theme_mod('footer_col3_section') ) : '<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-rss"></i></a>
					<a href="#"><i class="fa fa-youtube"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>'; ?>
			<div class="one_third_last" id="footer_column3">
				<?php if( $footer_social_icons ): ?>
					<div class="footer_social_icons">
						<?php echo $footer_social_icons; ?>
					</div>
				<?php endif; ?>	
			</div>
		</div> <!-- end Footer bottom section  -->

	<?php } ?>
	</footer>