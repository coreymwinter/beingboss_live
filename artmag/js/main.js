(function($){
"use strict";

var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};

function equalHeightArt(groupHeight) {
    groupHeight.each(function() {
        var tallest = 0;
        $(this).find('.equal').each(function() {
            var thisHeight = $(this).height();                                      
            if(thisHeight > tallest) {
                tallest = thisHeight;
            }
        });
        $(this).find('.equal').height(tallest);
    });
}

$(document).ready(function(){


if($('.rtl').length){
    var owlDirect = 'rtl';
}else{
    var owlDirect = 'ltr';
}

$(".owl-short").owlCarousel({
    direction:owlDirect,
    slideSpeed : 300,
    paginationSpeed : 400,
    singleItem:true,
    navigation:false,
    autoPlay : 500000,
});

$("#owl-post-slide").owlCarousel({
    direction:owlDirect,
    slideSpeed : 300,
    paginationSpeed : 400,
    singleItem:true,
    navigation:true,
    pagination:false,
    navigationText : ["&larr;","&#8594;"],
    autoPlay : 5000,
});

$("#owl-der").owlCarousel({
    direction:owlDirect,
    slideSpeed : 300,
    paginationSpeed : 400,
    singleItem:true,
    navigation:true,
    pagination:false,
    navigationText : ["&larr;","&#8594;"],
    autoPlay : 5000,
});

if(jQuery('.stick-header-info').length){
    var stickOptions = {
        offset: 350,
        offsetSide: 'top',
        classes: {
            clone:   'banner--clone',
            stick:   'banner--stick',
            unstick: 'banner--unstick'
        }
    };
    var banner = new Headhesive('.stick-header-info', stickOptions);
}

if(jQuery('.fullwidthimage').length){
    $(".fullwidthimage").css('left', '-' + $(".fullwidthimage").offset().left + 'px');
    $('.fullwidthimage').css('width',$( window ).width());
}

$(".share-box ul li a").on("click", function() {
    var left = screen.width / 2 - 320, top = screen.height / 2 - 220 - 100;
    return window.open($(this).attr("href"), "mywin", "left=" + left + ",top=" + top + ",width=640,height=440,toolbar=0"),
    !1;
});

/* Footer Instagram */
if(jQuery('.footer-instagram-widget').length){
    var instasize = $('.footer-instagram-widget .instagram-widget ul').children('li').length;
    var lastinsta = 100/instasize;
    $('.footer-instagram-widget ul li').css({'width':lastinsta+'%'});
}
/* Footer Instagram */

$(".share-but").hover(function(){
    $(this).children('.share-box').fadeIn();
},function(){
    $(this).children('.share-box').fadeOut();
});

/* Search */
$('.search_button').click(function(e){
    e.preventDefault();
    e.stopPropagation();
    if($(this).hasClass('isOpenNo')){
        $('#search-wrapper').fadeIn();
        $("#search-wrapper input").focus();
        $('.search_button').removeClass('isOpenNo');
        $('.search_button').addClass('isOpenYes');
    }else{
        $('#search-wrapper').fadeOut();
        $('.search_button').removeClass('isOpenYes');
        $('.search_button').addClass('isOpenNo');
    }
});

$('.search_button_mobile').click(function(e){
    e.preventDefault();
    e.stopPropagation();
    if($(this).hasClass('isOpenNoM')){
        $('#search-wrapper-mobile').fadeIn();
        $("#search-wrapper-mobile input").focus();
        $('.search_button_mobile').removeClass('isOpenNoM');
        $('.search_button_mobile').addClass('isOpenYesM');
    }else{
        $('#search-wrapper-mobile').fadeOut();
        $('.search_button_mobile').removeClass('isOpenYesM');
        $('.search_button_mobile').addClass('isOpenNoM');
    }
});

$('#search-wrapper').click(function(e){
    e.preventDefault();
    e.stopPropagation();
    $(this).fadeIn();
    $(this).focus();
});

$('body').click(function(){
    $('#search-wrapper').fadeOut();
    $('.search_button').removeClass('isOpenYes');
    $('.search_button').addClass('isOpenNo');
});
/* Search */

$('[data-toggle="tooltip"]').tooltip();

$(".fitvids").fitVids();

$('.mobile-menu').slicknav({
    prependTo : '#mobileMenuWrap'
});
$('.slicknav_btn').click(function(){
  $('.slicknav_icon').toggleClass('open');
});


$('.tabbed-area a').click(function(e){
  e.preventDefault();
  $(this).tab('show');
  $(this).parent().parent().find('.active').removeClass('active');
  $(this).parent().addClass('active');
});
$(".tabbed-area").each(function(){
    $(this).children().first().addClass('active');
});



/* Scroll to Top */
$(window).scroll(function(){
    if($(this).scrollTop() > 500) {
        $('.scrollup').fadeIn();
    }else{
        $('.scrollup').fadeOut();
    }
});
$('.scrollup').click(function(){
    $("html, body").animate({ scrollTop: 0 }, 600);
    return false;
});
/* Scroll to Top */


});

$(window).load(function(){
    equalHeightArt($('.equal-wrapper'));
    if($(window).width() > 767){
        equalHeightArt($('.equal-footer'));
    }
    if(!isMobile.any()){
        if(jQuery('.post-text').length){
            var postWrapper = jQuery(".post-text");

            var postContent = ( postWrapper.offset().top ) / 1.2,
                bottomPost = postWrapper.outerHeight(),
                postContentAndTop = postContent * 2 + bottomPost, progressBar, stopProgress;

            var getValue = function(){
                var progressScrollTop = jQuery(window).scrollTop();
                return progressBar = ( progressScrollTop - postContent ) / ( postContentAndTop - ( postContent * 2 ) ) * 100;
            }

            $(document).on('scroll', function(){
                stopProgress = Math.floor(getValue());
                if(stopProgress<101){
                        $('.reading-progress-bar').css({ width: stopProgress+"%" });
                }
            });
        }
    }
    var uniqnum = 10, 
        magicNewClass, 
        lposi, 
        lastval,
        uniqnclas,
        posiside,
        wido;
    $(".mega-menu-item-has-children").each(function(){
        $(this).find('ul.mega-sub-menu').addClass('uniq' + uniqnum);
        uniqnclas = "uniq" + uniqnum;
        lposi = $(this).position();
        wido = $(this).width();
        if ($(this).hasClass('mega-menu-megamenu')) {
            if($('.rtl').length){
                lastval = 10000;
            }else{
                lastval = (lposi.left + ((wido-5)/2))-25;
            }
        }else{
            lastval = (((wido-5)/2)+15)-25;
        }
        if($('.rtl').length){ posiside = "right"; }else{ posiside = "left"; }
        
        $('head').append('<style type="text/css">.'+ uniqnclas +'.mega-sub-menu'+':before{'+ posiside +':'+ lastval +'px !important;}</style>');
        uniqnum++;
    });
    $(".sf-menu").superfish({
        delay: 0,
        animation: {opacity:'show',height:'show'},
        animationOut: {opacity:'hide',height:'hide'},
        speed: 'normal'
    }).supposition();
    $('.blog-index, .hideSubMenuLoading, .pageback').css('z-index',0);
    $('.hideSubMenuLoading').css('display','none');
});

})(jQuery);