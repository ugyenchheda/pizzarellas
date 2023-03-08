<?php
function kaya_relatedpost($postid)
{	
$options=get_option('kayapati');
global $post;
$tags = wp_get_post_tags($postid);
if ($tags) {
$tag_ids = array();
foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;

$args=array(
'tag__in' => $tag_ids,
'post_type' => 'portfolio',
'post__not_in' => array($postid),
'showposts'=>4,  // Number of related posts that will be shown.
'ignore_sticky_posts'=>1
); 
$my_query = new wp_query($args);
$kaya_related_projects_text=get_theme_mod('pf_related_post_title') ? get_theme_mod('pf_related_post_title'):'Related Posts';
$pf_related_images_height=get_theme_mod('pf_related_images_height') ? get_theme_mod('pf_related_images_height'):'480';
echo '<div class="vspace"> </div>';
if( $my_query->have_posts() ) {
 	echo '<div class="vspace"> </div>';
		echo '<div id="relatedposts">';
		echo '<span class="relatedpost_title">';
	echo '<h3>'.$kaya_related_projects_text.'</h3>';
			echo '<div class="portfolio_extra"><ul id="list" class="da-thumbs isotope-container porfolio_items clearfix">';
			while ($my_query->have_posts()) {
				$my_query->the_post();
				$imgurl=wp_get_attachment_url( get_post_thumbnail_id() );
				//if ( has_post_thumbnail() ) { 

				echo '<li class="all isotope-item">';   ?>
				<div class="item_container">
                  <?php  $params = array('width' => '460' , 'height' => $pf_related_images_height, 'crop' => true);
					 echo kaya_imageresize($post->ID,$params,'');   ?>
						<?php if( get_theme_mod('pf_lightbox_disable') != 'on' ): ?> 
						<a  rel="prettyPhoto['gallery']" title="<?php echo the_title();?>" class="link_to_image pf_images" href="<?php echo $imgurl ?>">&nbsp;</a>
					<?php endif; ?>
					<?php if( get_theme_mod('pf_post_link_disable') != 'on' ): ?> 
						<a class="link_to_post" href="<?php the_permalink(); ?>">&nbsp; </a>
					<?php endif; ?>
				</div>
					<?php if( get_theme_mod('pf_enable_title') == 'on' ):  ?>
						<div class="portfolio_post_content">
	            			<h4><?php echo the_title(); ?></h4>
	            		</div>	
            		<?php endif; ?>	
                </li>
			<?php 	//}
			}
		echo '</ul>';
	echo '</div>';echo '</div>';
}
}
$backup='';
$post = $backup;
wp_reset_query();
}
?>