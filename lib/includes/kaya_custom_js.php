<?php
function kaya_custom_js(){
	$pf_post_link = ( get_theme_mod('pf_lightbox_disable') == 'on'  ) ? '50%' : '30%'; 
	$pf_post_class = ( get_theme_mod('pf_lightbox_disable') == 'on'  ) ? 'left' : 'right';
	$pf_lightbox = ( get_theme_mod('pf_post_link_disable') == 'on'  ) ? '50%' : '30%'; 
	// pf_post_link_disable
 ?>
	<script type="text/javascript">
(function($) {
  "use strict";
	$(function() {
	
/****************** Portfolio Isotope code **************/
if (jQuery().isotope){
var tempvar = "all";
$(window).load(function(){
$(function (){
	var isotopeContainer = $('.isotope-container'),
	isotopeFilter = $('#filter'),
	isotopeLink = isotopeFilter.find('a');
	isotopeContainer.isotope({
		itemSelector : '.isotope-item',
		//layoutMode : 'fitRows',
		filter : '.' +tempvar,
		 masonry:  {
                   columnWidth:    1,
                    isAnimated:     true,
                    isFitWidth:     true
                }
	});
	isotopeLink.click(function(){
		var selector = $(this).attr('data-category');
		isotopeContainer.isotope({
			filter : '.' + selector,
			itemSelector : '.isotope-item',
			//layoutMode : 'fitRows',
			animationEngine : 'best-available'
		});
		isotopeLink.removeClass('active');
		$(this).addClass('active');
		return false;
	});
});
		$("#filter ul li a").removeClass('active');
		$("#filter ul li."+tempvar+ " a").addClass('active');
});
}

 // Portfolio Hover
$('.portfolio-page-template li, #relatedposts li, .pf_taxonomy_gallery li').hover(function(){
  $(this).find('img').fadeTo(500,0.6);
  $(this).find('.link_to_image, .link_to_video').css({'left':'-50px','display':'block'}).stop().animate({'left':'<?php echo $pf_lightbox; ?>', opacity:1},600);
  $(this).find('.link_to_post').css({'<?php echo $pf_post_class; ?>':'-50px','display':'block'}).stop().animate({'<?php echo $pf_post_class; ?>':'<?php echo $pf_post_link; ?>',opacity:1},600);
  //alert('test');
},function(){
  $(this).find('img').fadeTo(500,1);
  $(this).find('.link_to_image, .link_to_video').css({'left':'50','display':'block'}).stop().animate({'left':'-<?php echo $pf_lightbox; ?>',opacity:0},600);
  $(this).find('.link_to_post').css({'<?php echo $pf_post_class; ?>':'50px','display':'block'}).stop().animate({'<?php echo $pf_post_class; ?>':'-<?php echo $pf_post_link; ?>',opacity:0},600);
});

// Shopping Cart Icon
<?php
$cart_icon = get_theme_mod('menu_bar_cart_icon') ? get_theme_mod('menu_bar_cart_icon') : '0';
if( $cart_icon == '0' ){
 if( class_exists('woocommerce')){ 
	global $woocommerce;
	$url =  $woocommerce->cart->get_cart_url();
	?>
	$("ul#jqueryslidemenu").append('<li><a href="<?php echo $url; ?>" class="cart-contents"><i class="fa fa-shopping-cart">&nbsp; </i><span><?php echo sprintf(_n('%d ', '%d', $woocommerce->cart->cart_contents_count, 'woothemes' ), $woocommerce->cart->cart_contents_count); ?> </span></a></li>');
<?php }  } ?>

});
})(jQuery);
</script>
<?php
	
 } 
add_action( 'wp_footer', 'kaya_custom_js', 100 );
?>
<?php  ?>