(function($) {
  "use strict";
  $(function() {
    $(window).load(function(){$('body').width($('body').width()+1).width('auto')});
    $("[rel^='prettyPhoto']").prettyPhoto();
    $('.more-link').addClass("readmore");
    $('#mid_container').animate({opacity:1},1200);
    $('#main_slider').animate({opacity:1},1200);
    $('.Portfolio_gallery, .gallery').animate({opacity:1},2000);
    $(".panel-grid-cell:not(.panel-row-style)").parent('.panel-grid').addClass("no-panel-row-style");
    $('#wp-calendar a').parent().addClass('cal-blog');
    $('.widget_iconbox-widget, .widget_kaya-client, .widget_kaya-skillset' ).parent().addClass('kaya_widegts_parent');
    $('.footer_widgets > div').addClass('footer_widgets_column');
    $('.widget_sudo_slider #controls').addClass('widget_controls');
    $('.widget_kaya-skillset').parent().addClass('widget_kaya-skillset-parent');
    $('.widget_kaya-testimonials').parent().addClass("kaya-testimoial-parent");  // Testimonial
    $('.widget_dropcap-widget').parent().addClass("kaya-drocap-parent");  // Testimonial
    $('.widget_kaya-rolling').parent().addClass("kaya-rollnumber-parent");  // Rolling numbers 
    $('.panel-row-style').parent().addClass("panel-row-style-parent");
    $( ".promobox_video_bg" ).next('.panel-row-style-parent').prev('.promobox_video_bg').addClass('promobox_bottom');
    $('.widget_kaya-portfolio-slider-widget').parent().parent().next('.panel-row-style-parent').prev().addClass('portfolio_slider_container');
    $('.widget_kaya-portfolio-slider-widget').parent().parent().css({"padding-bottom":"0","position":"relative","z-index":"3"} );

    $(".panel-row-style-parent").next('.panel-row-style-parent').prev('.panel-row-style-parent').css("cssText", "margin-bottom: 0px !important;");
    $('.widget_kaya-title').parent().parent().parent(".panel-row-style-parent").next('.panel-row-style-parent').prev('.panel-row-style-parent').css("cssText", "margin-bottom: 0px !important;");
    $('.widget_kaya-title').parent().parent(".no-panel-row-style").attr('style', 'border-bottom: 0!important');
    $('.widget_kaya-title.panel-last-child').parent('.panel-grid-cell').parent(".panel-row-style").attr('style',  'padding-bottom: 0px!important; border-bottom: 0!important');
    $('.widget_kaya-title').parent().parent().parent(".panel-row-style-parent").next(".panel-row-style-parent").children(".panel-row-style").attr('style',  'padding-top: 0px !important; border-top:0!important');
    $('.entry-content div.panel-row-style-parent:last-child').parent().parent().parent().parent().addClass("panel-row-style-parent-last");
    $('.entry-content div.panel-row-style-parent:nth-child(1)').parent().parent().parent().parent().addClass("panel-row-style-parent-first");
    $('.entry-content').closest('div[class^="panel-row-style-parent"]').parent().parent().addClass('test');

    $('#mid_container, #slider_wrapper, #homeslider, .single_img  ul.isotope_gallery, footer .Portfolio_gallery').animate({opacity:1},5000);
    $( ".panel-row-style" ).append( "<div class='container_bg'> </div>" );
    $('span#controls .prevBtn, span#controls .nextBtn').css('display','block');
    $(".widget_kaya-vspace").parent().parent().css("cssText", "margin-bottom: 0px !important;");
    $(".widget_kaya-title").parent().parent('.no-panel-row-style').css("cssText", "margin-bottom: 0px!important;");
    $('.widget_kaya-slider').animate({opacity:1},5000);
    // Pricing table
    $('.widget_spa-pricing-table').parent().addClass('pricing_table_parent');
    $('.pricing_table_parent').next('.pricing_table_parent').css('padding','0').prev('.pricing_table_parent').css('padding-right','0');
    $('.pricing_table_parent').next('.pricing_table_parent').css('padding','0').prev('.pricing_table_parent').css('padding-right','0');
  // Responsive Menu Nav
  	 $("<select />").appendTo(".menu");
    // Create default option "Go to..."
    $("<option />", {
    "selected": "selected",
    "value"   : "",
    "text"    : "Menu..."
    }).appendTo(".menu select");

  // Populate dropdowns with the first menu items
  $(".menu ul li a").each(function() {
  var el = $(this);
  if($(this).parents("ul.sub-menu").length > 0){
  $("<option />",{
  "value"   : el.attr("href"),
  //"text"    : '\xa0'+ '\xa0'+ '\xa0'+ el.text()
  "text"    : " -- "+ el.text()
  }).appendTo(".menu select");
  }else{
  $("<option />", {
  "value"   : el.attr("href"),
  "text"    : el.text()
  }).appendTo(".menu select");
  }
  });
  //make responsive dropdown menu actually work     
  $(".menu select").change(function() {
  window.location = $(this).find("option:selected").val();
  });

  // $ slide menu 
  $('.menu ul:first > li').addClass("main-links");
  $(".menu ul li.main-links:last-child").css("border-right","none");

/****************** masonry code **************/
if (jQuery().isotope){
$(window).load(function(){
$(function (){
  var isotopeContainer = $('.isotope-container, .portfolio_gallery, .blog-isotope-container, .widget-isotope-container, .gallery');
  isotopeContainer.isotope({
    masonry:{
                   columnWidth:    1,
                    isAnimated:     true,
                    isFitWidth:     true
                }
  });
});
});
}

// Scroll Top
 $(window).scroll(function(){
    if ($(this).scrollTop() > 100) {
        $('.scroll_top').fadeIn();
    } else {
        $('.scroll_top').fadeOut();
    }
});
 $('.scroll_top').click(function(){
    $("html, body").animate({ scrollTop: 0 }, 600);
    return false;
});

// Slider Arrows Hide / Show
$('.widget_controls .prevBtn, .widget_sudo_slider .nextBtn, .slides-navigation').hide();
$('#sudo_slider_wrapper, #slides').hover(function(){
     $('.widget_controls .prevBtn, .widget_controls .nextBtn, .slides-navigation', this).fadeIn();
},function(){
     $('.widget_controls .prevBtn, .widget_controls .nextBtn, .slides-navigation', this).fadeOut();
});
// parallax Image
 $(window).resize(function(){
     var $header_wrapper = jQuery("#header_wrapper").height()+100;
    var windowHeight = (Math.ceil($(window).height()) - $header_wrapper);
    $("#parallax_single_image").height(windowHeight);
  });
 var $header_wrapper = jQuery("#header_wrapper").height()+100;
var windowHeight = (Math.ceil($(window).height()) - $header_wrapper);
$("#parallax_single_image").height(windowHeight);
//Fit Videos
 $("#mid_container_wrapper").fitVids({ customSelector: "iframe[src^='http://socialcam.com']"});
  
// Search Box
$('.sarch_box_wrapper').hide();
 $('.serch_box, .close_search').click(function(e){    
      $('.sarch_box_wrapper').slideToggle("fast");
  });

if($('body')[0].scrollHeight > $(window).height()){
    $('#bottom_footer').addClass("scrollbar");  
}else
$('#bottom_footer').addClass("noscrollbar"); 
/* Shooping Cart */
$('.cross-sells ul.products li ').removeClass('first last');
$('.widget_shopping_cart_content .buttons a').removeClass('wc-forward');
$('.button, .form-submit #submit, .widget_shopping_cart_content .buttons a').not('.wc-forward').addClass('primary-button');
$('.checkout-button, #place_order, .cart-sussess-message a, a.added_to_cart').addClass('seconadry-button');
$('.related.products li, .upsells.products li').removeClass('first');
$('.related.products li, .upsells.products li').removeClass('last');
$('.add_to_wishlist').removeClass('single_add_to_wishlist button alt primary-button');
$('i.icon-align-right').removeClass('icon-align-right').addClass('fa fa-heart');        

});
})(jQuery);

