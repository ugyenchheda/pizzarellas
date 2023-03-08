<?php
get_header();
$kaya_options = get_option('kayapati');
$sidebar_layout=get_post_meta(get_the_id(),'kaya_pagesidebar',true);
$sidebar_layout=get_post_meta(get_the_id(),'kaya_pagesidebar',true); 
$portfolio_project_skills_title=get_post_meta(get_the_ID(),'portfolio_project_skills_title' ,true);
switch( $sidebar_layout ){
	case 'leftsidebar':
		$sidebar_class="two_third_last";
		break;
	case 'rightsidebar':
		$sidebar_class="two_third";
		break;	
	case 'full':
		$sidebar_class="fullwidth";
		break;		
}
$aside_class=($sidebar_layout== "leftsidebar" ) ?  'one_third' : 'one_third_last';
$portfolio_skills_title= isset( $kaya_options['portfolio_skills_title'] ) ?  $kaya_options['portfolio_skills_title'] : ''; ?>
<!-- Start Middle Section  -->
<section id="mid_container_wrapper">
	<section id="mid_container" class="container"> 
		<?php
	   $relatedpost=get_post_meta(get_the_ID(),'relatedpost' ,true);
	   $portfolio_project_skills=get_post_meta(get_the_ID(),'portfolio_project_skills' ,false);
		$postid=$post->ID;
		$meta = get_post_meta( $post->ID, 'portfolio_slide', false );
		$video_type = get_post_meta(get_the_ID(), 'video_type', true );
		$pf_featuread_image_disable=get_post_meta(get_the_ID(),'pf_featuread_image_disable' ,true);
		foreach($meta as $val)
			{
			}
	  if (isset( $val ) || ($video_type !='none') ){
		?>
		<div class="<?php echo $sidebar_class; ?>" id="content_section">
			<?php
			get_template_part('loop','portfolio');  ?>
		</div>
		<!--StartSidebar Section -->
		<?php if($sidebar_layout !="full") { ?>
			<div class="<?php echo $aside_class;?> portfolio_aside">
				<?php the_content(); ?>
				<?php kaya_portfolio_skills($portfolio_project_skills, $portfolio_project_skills_title ); ?>
				<?php //echo social_sharing_icons(); ?>
			</div>
		<?php }  } else{  ?>
		  <?php if($sidebar_layout !="full") { ?>
		<div class="fullwidth portfolio_fullwidth portfolio_aside">
			<?php
			get_template_part('loop','portfolio');
			echo '<div class="content_box">';
			the_content(); ?>
			<?php kaya_portfolio_skills($portfolio_project_skills, $portfolio_project_skills_title ); ?>
				<?php //echo social_sharing_icons(); ?>
		</div>	</div>
			<?php } else{
			 get_template_part('loop','portfolio');
			//the_content();
			}
		}
		?>
	<div class="clear"> </div>
	<?php	wp_reset_query();
	if($relatedpost=='1') {
		kaya_relatedpost($post->ID); 
	}
	$comment_status = get_post_meta($post->ID,'comment_status', false);
	if( $comment_status != "1") {
		comments_template( '', true );
	} 
		?>
			<!--End content Section -->
	<div class="clear"></div>
	<?php get_footer(); ?>