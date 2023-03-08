(function($) {
  "use strict";
	$(function() {

	$("#video_type").change(function () {
	$("#youtube_video").parent().parent().hide();
	$("#vimeo_video").parent().parent().hide();
	var selectlayout = $("#video_type option:selected").val(); 
	$("#video_embed").parent().parent().show();
	switch(selectlayout)
	{
		case 'vimeo':
			$("#vimeo_video").parent().parent().show();
		break;
		case 'youtube':
			$("#youtube_video").parent().parent().show();
		break;
		case 'videoembed':
			$("#video_embed").parent().parent().show();
		break;
		
	}
}).change();

//Meta Page Optons

$("#select_page_options").change(function() {
	var select_options = $("#select_page_options option:selected").val(); 
	$('#slider').parent().parent().hide();
	$('#kaya_custom_title').parent().parent().hide();
	$('#kaya_custom_title_description').parent().parent().hide();
	$("#page_title_alignment").parent().parent().hide();
	$('.kaya_title_color').parent().parent().hide();
	$("#transitionStyle").parent().parent().hide();
	$(".Kaya_Sliders").parent().parent().hide();
	$("#slider_height").parent().parent().hide();
	$("#bx_slider_width").parent().parent().hide();
	$("#Kaya_slider_autoplay").parent().parent().hide();
	$("#Kaya_slider_height").parent().parent().hide();
	$("#Kaya_slider_transitions").parent().parent().hide();
	$("#kaya_slidelink").parent().parent().hide();
	$("#kaya_slidecaption").parent().parent().hide();
	$("#page_video").parent().parent().hide();
	$("#Kaya_slider_top").parent().parent().hide();
	$("#bx_transitions").parent().parent().hide();
	$("#customslider_type").parent().parent().hide();
	$("#Single_Image_height").parent().parent().hide();
	$(".Single_Image_Upload").parent().parent().hide();
	$("#Single_Image_content").parent().parent().hide();
	$("#single_img_attachment").parent().parent().parent().hide();
	$("#kaya_slide_caption").parent().parent().hide();
	$("#auto_play").parent().parent().hide();
	$("#page_video_text").parent().parent().hide();
	$(".Kaya_superslide_category").parent().parent().hide();
	$("#owl_slider_height").parent().parent().hide();
	$("#Single_slider_height").parent().parent().hide();
	$("#Single_Image_opacity").parent().parent().hide();
	$('.page_video_mute').parent().parent().hide();
	$("#Kaya_portfolio_slider_height").parent().parent().hide();
	$("#slider_items").parent().parent().hide();
	$(".Kaya_slider_category").parent().parent().hide();
	$("#slider_post_type").parent().parent().hide();
	$(".Kaya_portfolio_category").parent().parent().hide();
	$("#fluid_slider_post_type").parent().parent().hide();
	$(".fluid_portfolio_category").parent().parent().hide();
	$("#Kaya_slider_limit").parent().parent().hide();
	$("#Kaya_fluid_slider_limit").parent().parent().hide();
	$("#Kaya_bx_slider_limit").parent().parent().hide();
	$("#Kaya_slider_pause").parent().parent().hide();
	$("#Kaya_slider_easing").parent().parent().hide();
	$("#adaptive_height").parent().parent().hide();
	$("#fluid_portfolio_order").parent().parent().hide();
	$("#kaya_portfolio_order").parent().parent().hide();
	$("#Kaya_fluid_slider_auto_play").parent().parent().hide();
	$("#kaya_slider_order").parent().parent().hide();
	$("#Kaya_slider_auto_play").parent().parent().hide();
	$("#Kaya_slider_mode").parent().parent().hide();

	switch(select_options){
		case 'page_title_setion':
			$('#slider').parent().parent().hide();
			$('#kaya_custom_title').parent().parent().show();
			$('#kaya_custom_title_description').parent().parent().show();
			$('.page_bg_Image_Upload').parent().parent().show();
			$('.kaya_title_color').parent().parent().show();
			$("#page_title_alignment").parent().parent().show();
			//$('#page_title_bg_color').parent().parent().show();
			//page_slider_options();
			break;

		case 'page_slider_setion' :
			$('#slider').parent().parent().show();
			page_slider_options();
			
			break;
		case 'video':
			$("#page_video").parent().parent().show();
			$("#page_video_text").parent().parent().show();
			$("#Single_slider_height").parent().parent().show();
			$('.page_video_mute').parent().parent().show();
			break;
		case 'singleimage':
			$("#Single_Image_height").parent().parent().show();
			$(".Single_Image_Upload").parent().parent().show();
			$("#Single_Image_content").parent().parent().show();
			$("#single_img_attachment").parent().parent().parent().show();
			$("#Single_Image_opacity").parent().parent().show();
			break;			
	}	

}).change();

// Meta BOxes
function page_slider_options(){

	$("#slider").change(function () {	
	var selectlayout = $("#slider option:selected").val(); 
	$("#transitionStyle").parent().parent().hide();
	$(".Kaya_Sliders").parent().parent().hide();
	$("#slider_height").parent().parent().hide();
	$("#bx_slider_width").parent().parent().hide();
	$("#Kaya_slider_autoplay").parent().parent().hide();
	$("#Kaya_slider_height").parent().parent().hide();
	$("#Kaya_slider_transitions").parent().parent().hide();
	$("#kaya_slidelink").parent().parent().hide();
	$("#kaya_slidecaption").parent().parent().hide();
	$("#Kaya_slider_top").parent().parent().hide();
	$("#bx_transitions").parent().parent().hide();
	$("#customslider_type").parent().parent().hide();
	$("#kaya_slide_caption").parent().parent().hide();
	$("#auto_play").parent().parent().hide();
	$("#owl_slider_height").parent().parent().hide();
	$("#Single_slider_height").parent().parent().hide();
	$(".Kaya_portfolio_category").parent().parent().hide();
	$("#Kaya_portfolio_slider_height").parent().parent().hide();
	$("#slider_items").parent().parent().hide();
	$(".Kaya_slider_category").parent().parent().hide();
	$("#slider_post_type").parent().parent().hide();
	$(".fluid_portfolio_category").parent().parent().hide();
	$(".Kaya_superslide_category").parent().parent().hide();
	$("#fluid_slider_post_type").parent().parent().hide();
	$("#Kaya_slider_limit").parent().parent().hide();
	$("#Kaya_fluid_slider_limit").parent().parent().hide();
	$("#Kaya_bx_slider_limit").parent().parent().hide();
	$("#Kaya_slider_pause").parent().parent().hide();
	$("#Kaya_slider_easing").parent().parent().hide();
	$("#adaptive_height").parent().parent().hide();
	$("#fluid_portfolio_order").parent().parent().hide();
	$("#kaya_portfolio_order").parent().parent().hide();
	$("#Kaya_fluid_slider_auto_play").parent().parent().hide();
	$("#kaya_slider_order").parent().parent().hide();
	$("#Kaya_slider_auto_play").parent().parent().hide();
	$("#Kaya_slider_mode").parent().parent().hide();

	switch(selectlayout)
	{
	case 'bxslider':
		$(".Kaya_Sliders").parent().parent().show();
		$("#Kaya_slider_autoplay").parent().parent().show();
		$("#Kaya_slider_height").parent().parent().show();
		$("#Kaya_slider_transitions").parent().parent().show();
		$("#kaya_slidelink").parent().parent().show();
		$("#kaya_slidecaption").parent().parent().show();
		$("#Kaya_slider_top").parent().parent().show();
		$("#Kaya_bx_slider_limit").parent().parent().show();
		$("#Kaya_slider_pause").parent().parent().show();
		$("#Kaya_slider_easing").parent().parent().show();
		$("#adaptive_height").parent().parent().show();
		$("#kaya_slider_order").parent().parent().show();
		$("#Kaya_slider_mode").parent().parent().show();
		bx_slider_adaptive_height();

		break;
	case 'customslider':
		$("#customslider_type").parent().parent().show();
		break;
	
	}
}).change();

}
function page_slider_posttype(){
$("#slider_post_type").change(function () {	
	var selectlayout = $("#slider_post_type option:selected").val(); 
	$(".Kaya_slider_category").parent().parent().hide();
	$(".Kaya_portfolio_category").parent().parent().hide();

	switch(selectlayout)
	{
	case 'portfolio_category':
		$(".Kaya_portfolio_category").parent().parent().show();
		break;
	case 'slider_category':
		$(".Kaya_slider_category").parent().parent().show();
		break;
				
	
	}
}).change();
}

function bx_slider_adaptive_height(){
$("#adaptive_height").change(function () {	
	var selectlayout = $("#adaptive_height option:selected").val(); 
	$("#Kaya_slider_height").parent().parent().hide();
	switch(selectlayout)
	{
	case 'false':
		$("#Kaya_slider_height").parent().parent().show();
		break;
	case 'true':
		
		break;
				
	
	}
}).change();
}
//page_slider_options();
    // Display only needed post meta boxes
    var Kaya_post_options = $('#post-formats-select input'),
        kaya_meta_link = $('#kaya_link_format'),
        kaya_pf_link = $('#post-format-link'),
        kaya_meta_gallery = $('#kaya_post_format_gallery'),
        kaya_pf_gallery = $('#post-format-gallery'),
        kaya_meta_video = $('#kaya_post_format_video'),
        kaya_pf_video = $('#post-format-video'),
        kaya_meta_audio = $('#kaya_audio_format'),
        kaya_pf_audio = $('#post-format-audio'),
        kaya_meta_quote = $('#kaya_quote_format_quote'),
        kaya_pf_quote = $('#post-format-quote');

    function kaya_hide_post_formates(){
        kaya_meta_link.css('display', 'none');
        kaya_meta_gallery.css('display', 'none');
        kaya_meta_video.css('display', 'none');
        kaya_meta_audio.css('display', 'none');
        kaya_meta_quote.css('display', 'none');
    }

    kaya_hide_post_formates();

    Kaya_post_options.on('change', function(){
        var that = $(this);
        kaya_hide_post_formates();
        if(that.val() === 'link'){
            kaya_meta_link.css('display', 'block');
        }else if(that.val() === 'gallery'){
            kaya_meta_gallery.css('display', 'block');
        }else if(that.val() === 'video'){
            kaya_meta_video.css('display', 'block');
        }else if(that.val() === 'audio'){
            kaya_meta_audio.css('display', 'block');
        }else if(that.val() === 'quote'){
            kaya_meta_quote.css('display', 'block');
        }
    });

    if(kaya_pf_link.is(':checked')) kaya_meta_link.css('display', 'block');
    if(kaya_pf_gallery.is(':checked')) kaya_meta_gallery.css('display', 'block');
    if(kaya_pf_video.is(':checked')) kaya_meta_video.css('display', 'block');
    if(kaya_pf_audio.is(':checked')) kaya_meta_audio.css('display', 'block');
    if(kaya_pf_quote.is(':checked')) kaya_meta_quote.css('display', 'block');
    //Full Screeen Slider / Video Selection
  $("#select_full_bg_type").change(function () {
  	$("#full_screen_bg_images_description").parent().parent().hide();
	$("#full_screen_bg_transition").parent().parent().hide();
	$("#full_screen_auto_play").parent().parent().hide();
	$("#fullscreen_bg_video").parent().parent().hide();
	$(".full_screen_single_bg_image").parent().hide();
	$(".single_bg_img_repeat").parent().parent().hide();	
	var selectlayout = $("#select_full_bg_type option:selected").val(); 
	//$("#video_embed").parent().parent().hide();
	switch(selectlayout)
	{
		case 'fullscreen_video_bg':
			$("#fullscreen_bg_video").parent().parent().show();
			break;
		case 'fullscreen_img_slider':
			$("#full_screen_bg_transition").parent().parent().show();
			$("#full_screen_auto_play").parent().parent().show();
			$("#full_screen_bg_images_description").parent().parent().show();
			break;
		case 'single_bg_image':
			$(".full_screen_single_bg_image").parent().show();
			$(".single_bg_img_repeat").parent().parent().show();
			break;	
		
	}
}).change();

});
})(jQuery);