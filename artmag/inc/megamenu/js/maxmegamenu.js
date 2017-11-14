/*jslint browser: true, white: true */
/*global console,jQuery,megamenu,window,navigator*/

/**
 * Max Mega Menu jQuery
 */
(function($) {

    "use strict";

    $.maxmegamenu = function(menu, options) {

        var megamenu2035 = this;
        var $menu = $(menu);

        var defaults = {
            event: $menu.attr('data-event'),
            effect: $menu.attr('data-effect'),
            panel_width: $menu.attr('data-panel-width'),
            second_click: $menu.attr('data-second-click'),
            vertical_behaviour: $menu.attr('data-vertical-behaviour'),
            reverse_mobile_items: $menu.attr('data-reverse-mobile-items'),
            document_click: $menu.attr('data-document-click'),
            breakpoint: $menu.attr('data-breakpoint')
        };

        megamenu2035.settings = {};

        var isTouchDevice = function() {
            return (('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch);
        };


        megamenu2035.hidePanel = function(anchor, immediate) {
            if (immediate) {
                anchor.siblings('.mega-sub-menu').removeClass('mega-toggle-on').css('display', '');
                anchor.parent().removeClass('mega-toggle-on').triggerHandler("close_panel");
                return;
            }

            if ( megamenu.effect[megamenu2035.settings.effect] ) {
                var effect = megamenu.effect[megamenu2035.settings.effect]['out'];
                var speed = megamenu.effect[megamenu2035.settings.effect]['speed'] ? megamenu.effect[megamenu2035.settings.effect]['speed'] : "fast";

                if (effect.css) {
                    anchor.siblings('.mega-sub-menu').css(effect.css);
                }

                if (effect.animate) {
                    anchor.siblings('.mega-sub-menu').animate(effect.animate, speed, function() {
                        anchor.parent().removeClass('mega-toggle-on').triggerHandler("close_panel");
                    });
                } else {
                    anchor.parent().removeClass('mega-toggle-on').triggerHandler("close_panel");
                }
            } else {
                anchor.parent().removeClass('mega-toggle-on').triggerHandler("close_panel");
            }

        };


        megamenu2035.hideAllPanels = function() {
            $('.mega-toggle-on > a', $menu).each(function() {
                megamenu2035.hidePanel($(this), true);
            });
        };


        megamenu2035.hideSiblingPanels = function(anchor, immediate) {
            // all open children of open siblings
            anchor.parent().siblings().find('.mega-toggle-on').andSelf().children('a').each(function() {
                megamenu2035.hidePanel($(this), immediate);
            });
        }


        megamenu2035.isDesktopView = function() {
            return $(window).width() > megamenu2035.settings.breakpoint;
        }


        megamenu2035.hideOpenSiblings = function() {
            // desktops, horizontal
            if ( megamenu2035.isDesktopView() && ( $menu.hasClass('mega-menu-horizontal') || $menu.hasClass('mega-menu-vertical') ) ) {
                return 'immediately';
            }

            if ( megamenu2035.settings.vertical_behaviour == 'accordion' ) {
                return 'animated';
            }

        }


        megamenu2035.showPanel = function(anchor) {

            switch( megamenu2035.hideOpenSiblings() ) {
                case 'immediately':
                    megamenu2035.hideSiblingPanels(anchor, true);
                    break;
                case 'animated':
                    megamenu2035.hideSiblingPanels(anchor, false);
                    break;
            }

            // apply dynamic width and sub menu position
            if ( anchor.parent().hasClass('mega-menu-megamenu') && $(megamenu2035.settings.panel_width).length ) {
                var submenu_offset = $menu.offset();
                var target_offset = $(megamenu2035.settings.panel_width).offset();

                anchor.siblings('.mega-sub-menu').css({
                    width: $(megamenu2035.settings.panel_width).outerWidth(),
                    left: (target_offset.left - submenu_offset.left) + "px"
                });
            }

            if ( megamenu.effect[megamenu2035.settings.effect] ) {
                var effect = megamenu.effect[megamenu2035.settings.effect]['in'];
                var speed = megamenu.effect[megamenu2035.settings.effect]['speed'] ? megamenu.effect[megamenu2035.settings.effect]['speed'] : "fast";

                if (effect.css) {
                    anchor.siblings('.mega-sub-menu').css(effect.css);
                }

                if (effect.animate) {
                    anchor.siblings('.mega-sub-menu').animate(effect.animate, speed, 'linear', function() {
                        $(this).css('visiblity', 'visible');
                    });
                }
            }

            anchor.parent().addClass('mega-toggle-on').triggerHandler("open_panel");
        };


        var openOnClick = function() {
            // hide menu when clicked away from
            $(document).on('click', function(event) {
                if ( ( megamenu2035.settings.document_click == 'collapse' || ! megamenu2035.isDesktopView() ) && ! $(event.target).closest(".mega-menu li").length ) {
                    megamenu2035.hideAllPanels();
                }
            });

            $('li.mega-menu-megamenu.mega-menu-item-has-children > a, li.mega-menu-flyout.mega-menu-item-has-children > a, li.mega-menu-flyout li.mega-menu-item-has-children > a', menu).on({
                click: function(e) {
                    // check for second click
                    if ( megamenu2035.settings.second_click == 'go' || $(this).parent().hasClass("mega-click-click-go") ) {
                        if ( ! $(this).parent().hasClass("mega-toggle-on") ) {
                            e.preventDefault();
                            megamenu2035.showPanel($(this));
                        }
                    } else {
                        e.preventDefault();

                        if ( $(this).parent().hasClass("mega-toggle-on") ) {
                            megamenu2035.hidePanel($(this), false);
                        } else {
                            megamenu2035.showPanel($(this));
                        }
                    }
                }
            });
        };


        var openOnHover = function() {
            $('li.mega-menu-megamenu.mega-menu-item-has-children, li.mega-menu-flyout.mega-menu-item-has-children, li.mega-menu-flyout li.mega-menu-item', menu).hoverIntent({
                over: function () {
                    megamenu2035.showPanel($(this).children('a'));
                },
                out: function () {
                    if ($(this).hasClass("mega-toggle-on")) {
                        megamenu2035.hidePanel($(this).children('a'), false);
                    }
                },
                timeout: megamenu.timeout,
                interval: megamenu.interval
            });
        };


        megamenu2035.init = function() {
            megamenu2035.settings = $.extend({}, defaults, options);

            $menu.removeClass('mega-no-js');

            $menu.siblings('.mega-menu-toggle').on('click', function() {
                $(this).toggleClass('mega-menu-open');
            });

            if (isTouchDevice() || megamenu2035.settings.event === 'click') {
                openOnClick();
            } else {
                openOnHover();
            }

            if (!megamenu2035.isDesktopView() && megamenu2035.settings.reverse_mobile_items == 'true') {
                $menu.append($menu.children('li.mega-item-align-right').get().reverse());
            }
        };

        megamenu2035.init();

    };


    $.fn.maxmegamenu = function(options) {
        return this.each(function() {
            if (undefined === $(this).data('maxmegamenu')) {
                var megamenu2035 = new $.maxmegamenu(this, options);
                $(this).data('maxmegamenu', megamenu2035);
            }
        });
    };


    $(function() {
        $(".mega-menu").maxmegamenu();
    });


})(jQuery);