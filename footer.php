</section> <!-- end middle content section -->
</section> <!-- end middle Container wrapper section -->
	</section> <!-- Main Layout Section End -->   
	<div class="clear"> </div>
	<!-- end middle section -->
	<?php
	$most_footer_disable=get_theme_mod('most_footer_disable') ? get_theme_mod('most_footer_disable') : '0'; 
	$footer_disable=get_theme_mod('main_footer_disable') ? get_theme_mod('main_footer_disable') : '0';
	if( $most_footer_disable == '0'){
	?>
	<?php  get_template_part('lib/includes/footer_general'); // General Footer ?>
	<?php } ?>
	<div class="clear"></div> 
	<!--  Scrollto Top  -->
	<a href="#" class="scroll_top "><i class = "fa fa-arrow-up"> </i></a>
	<!--  Google Analytic  -->
	<?php  
	$google_tracking_code= get_theme_mod('google_tracking_code') ? get_theme_mod('google_tracking_code') : '';
		if ($google_tracking_code) { 	
			echo stripslashes($google_tracking_code); 					
		} else { ?>
	<?php } ?>
	<!--  end Google Analytics  -->
	<?php wp_footer(); ?>
</body>
</html>