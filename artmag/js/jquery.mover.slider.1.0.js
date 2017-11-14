/*
* mOver Slider v1.0 - jQuery Mouse Over Slider
* Copyright (c) 2016 ibrahim ARACI
* http://ibrah.im
*
* Free to use and abuse under the MIT license.
* http://www.opensource.org/licenses/mit-license.php
*/

;(function($){
    "use strict";
    $.fn.mOverSlider = function(o) {
        var defaults			= {
            height          	: 500,
            columns             : 4
        };

        var $wrapper            = this,
            $slideList          = $wrapper.find('ul.mOver-list'),
            $slides             = $slideList.children('li'),
            backgroundWrapper	= '.mOver-background',
            listClass           = '.mOver-list',
            lineClass           = '.mOver-bg-',
            getLineM            = null,
            getLine             = null,
            columnWidth         = null

        var settings            = $.extend({}, defaults, o);

        var init = function() {
            mover_sizes();
            core_mover();
        };

        var mover_sizes = function() {
            $wrapper.css({
                'height'    : settings.height
            });
            $slideList.css({
                'height'    : settings.height
            });
            columnWidth = 100 / settings.columns;
            $slides.css({
                'width'    	: columnWidth + '%'
            });
        };

        var core_mover = function() {
            $slides.hover(function(){
                getLineM = $(this).attr('data-video-line');
                $(backgroundWrapper).find(lineClass + getLineM).stop(0,1).fadeIn();
                $(listClass + ' li:not(:hover)').each(function(){
                    getLine = $(this).attr('data-video-line');
                    $(backgroundWrapper).find(lineClass + getLine).stop(0,1).fadeOut();
                });
            },function(){
            	// silence is golden
            });
        };

        init();

        $(window).load(function(){
            $('.mOver-loading').fadeOut().remove();
    	});

    };

})(jQuery);