<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // disable direct access
}

if ( ! class_exists( 'Mega_Menu_Style_Manager' ) ) :

/**
 *
 */
final class Mega_Menu_Style_Manager {

    /**
     *
     */
    var $settings = array();


    /**
     * Constructor
     *
     * @since 1.0
     */
    public function __construct() {

        $this->settings = get_option( "megamenu_settings" );

    }


    /**
     * Setup actions
     *
     * @since 1.0
     */
    public function setup_actions() {

        add_action( 'wp_ajax_megamenu_css', array( $this, 'ajax_get_css') );
        add_action( 'wp_ajax_nopriv_megamenu_css', array( $this, 'ajax_get_css') );
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        add_action( 'wp_head', array( $this, 'head_css' ), 9999 );

        add_action( 'megamenu_after_save_settings', array( $this, 'generate_css' ) );
        add_action( 'megamenu_after_save_general_settings', array( $this, 'generate_css' ) );
        add_action( 'megamenu_after_theme_save', array( $this, 'generate_css') );
        add_action( 'megamenu_after_theme_delete', array( $this, 'generate_css') );
        add_action( 'megamenu_after_theme_revert', array( $this, 'generate_css') );
        add_action( 'megamenu_after_theme_duplicate', array( $this, 'generate_css') );
        add_action( 'megamenu_after_theme_create', array( $this, 'generate_css') );
        add_action( 'megamenu_generate_css', array( $this, 'generate_css') );
        add_action( 'after_switch_theme', array( $this, 'generate_css') );

        // PolyLang
        if ( function_exists( 'pll_current_language' ) ) {
            add_filter( 'megamenu_css_transient_key', array( $this, 'polylang_transient_key') );
            add_filter( 'megamenu_css_filename', array( $this, 'polylang_css_filename') );
            add_action( 'megamenu_delete_cache', array( $this, 'polylang_delete_cache') );
        } else if ( defined( 'ICL_LANGUAGE_CODE' ) ) { // WPML
            add_filter( 'megamenu_css_transient_key', array( $this, 'wpml_transient_key') );
            add_filter( 'megamenu_css_filename', array( $this, 'wpml_css_filename') );
            add_action( 'megamenu_delete_cache', array( $this, 'wpml_delete_cache') );
        }


    }


    /**
     *
     *
     * @since 1.0
     */
    public function default_themes() {

        $themes['default'] = array(
            'title'                                     => __("Default", "megamenu"),
            'container_background_from'                 => '#222',
            'container_background_to'                   => '#222',
            'container_padding_left'                    => '0px',
            'container_padding_right'                   => '0px',
            'container_padding_top'                     => '0px',
            'container_padding_bottom'                  => '0px',
            'container_border_radius_top_left'          => '0px',
            'container_border_radius_top_right'         => '0px',
            'container_border_radius_bottom_left'       => '0px',
            'container_border_radius_bottom_right'      => '0px',
            'arrow_up'                                  => 'dash-f142',
            'arrow_down'                                => 'dash-f140',
            'arrow_left'                                => 'dash-f141',
            'arrow_right'                               => 'dash-f139',
            'font_size'                                 => '14px', // deprecated
            'font_color'                                => '#666', // deprecated
            'font_family'                               => 'inherit', // deprecated
            'menu_item_align'                           => 'left',
            'menu_item_background_from'                 => 'transparent',
            'menu_item_background_to'                   => 'transparent',
            'menu_item_background_hover_from'           => '#333',
            'menu_item_background_hover_to'             => '#333',
            'menu_item_spacing'                         => '0px',
            'menu_item_link_font'                       => 'inherit',
            'menu_item_link_font_size'                  => '14px',
            'menu_item_link_height'                     => '40px',
            'menu_item_link_color'                      => '#ffffff',
            'menu_item_link_weight'                     => 'normal',
            'menu_item_link_text_transform'             => 'normal',
            'menu_item_link_text_decoration'            => 'none',
            'menu_item_link_color_hover'                => '#ffffff',
            'menu_item_link_weight_hover'               => 'normal',
            'menu_item_link_text_decoration_hover'      => 'none',
            'menu_item_link_padding_left'               => '10px',
            'menu_item_link_padding_right'              => '10px',
            'menu_item_link_padding_top'                => '0px',
            'menu_item_link_padding_bottom'             => '0px',
            'menu_item_link_border_radius_top_left'     => '0px',
            'menu_item_link_border_radius_top_right'    => '0px',
            'menu_item_link_border_radius_bottom_left'  => '0px',
            'menu_item_link_border_radius_bottom_right' => '0px',
            'menu_item_border_color'                    => '#fff',
            'menu_item_border_left'                     => '0px',
            'menu_item_border_right'                    => '0px',
            'menu_item_border_top'                      => '0px',
            'menu_item_border_bottom'                   => '0px',
            'menu_item_border_color_hover'              => '#fff',
            'menu_item_highlight_current'               => 'off',
            'menu_item_divider'                         => 'off',
            'menu_item_divider_color'                   => 'rgba(255, 255, 255, 0.1)',
            'menu_item_divider_glow_opacity'            => '0.1',
            'panel_background_from'                     => '#f1f1f1',
            'panel_background_to'                       => '#f1f1f1',
            'panel_width'                               => '100%',
            'panel_border_color'                        => '#fff',
            'panel_border_left'                         => '0px',
            'panel_border_right'                        => '0px',
            'panel_border_top'                          => '0px',
            'panel_border_bottom'                       => '0px',
            'panel_border_radius_top_left'              => '0px',
            'panel_border_radius_top_right'             => '0px',
            'panel_border_radius_bottom_left'           => '0px',
            'panel_border_radius_bottom_right'          => '0px',
            'panel_header_color'                        => '#555',
            'panel_header_text_transform'               => 'uppercase',
            'panel_header_font'                         => 'inherit',
            'panel_header_font_size'                    => '16px',
            'panel_header_font_weight'                  => 'bold',
            'panel_header_text_decoration'              => 'none',
            'panel_header_padding_top'                  => '0px',
            'panel_header_padding_right'                => '0px',
            'panel_header_padding_bottom'               => '5px',
            'panel_header_padding_left'                 => '0px',
            'panel_header_margin_top'                   => '0px',
            'panel_header_margin_right'                 => '0px',
            'panel_header_margin_bottom'                => '0px',
            'panel_header_margin_left'                  => '0px',
            'panel_header_border_color'                 => 'panel_header_color',
            'panel_header_border_left'                  => '0px',
            'panel_header_border_right'                 => '0px',
            'panel_header_border_top'                   => '0px',
            'panel_header_border_bottom'                => '0px',
            'panel_padding_left'                        => '0px',
            'panel_padding_right'                       => '0px',
            'panel_padding_top'                         => '0px',
            'panel_padding_bottom'                      => '0px',
            'panel_widget_padding_left'                 => '15px',
            'panel_widget_padding_right'                => '15px',
            'panel_widget_padding_top'                  => '15px',
            'panel_widget_padding_bottom'               => '15px',
            'panel_font_size'                           => 'font_size',
            'panel_font_color'                          => 'font_color',
            'panel_font_family'                         => 'font_family',
            'panel_second_level_font_color'             => 'panel_header_color',
            'panel_second_level_font_color_hover'       => 'panel_header_color',
            'panel_second_level_text_transform'         => 'panel_header_text_transform',
            'panel_second_level_font'                   => 'panel_header_font',
            'panel_second_level_font_size'              => 'panel_header_font_size',
            'panel_second_level_font_weight'            => 'panel_header_font_weight',
            'panel_second_level_font_weight_hover'      => 'panel_header_font_weight',
            'panel_second_level_text_decoration'        => 'panel_header_text_decoration',
            'panel_second_level_text_decoration_hover'  => 'panel_header_text_decoration',
            'panel_second_level_background_hover_from'  => 'transparent',
            'panel_second_level_background_hover_to'    => 'transparent',
            'panel_second_level_padding_left'           => '0px',
            'panel_second_level_padding_right'          => '0px',
            'panel_second_level_padding_top'            => '0px',
            'panel_second_level_padding_bottom'         => '0px',
            'panel_second_level_margin_left'            => '0px',
            'panel_second_level_margin_right'           => '0px',
            'panel_second_level_margin_top'             => '0px',
            'panel_second_level_margin_bottom'          => '0px',
            'panel_second_level_border_color'           => 'panel_header_color',
            'panel_second_level_border_left'            => '0px',
            'panel_second_level_border_right'           => '0px',
            'panel_second_level_border_top'             => '0px',
            'panel_second_level_border_bottom'          => '0px',
            'panel_third_level_font_color'              => 'panel_font_color',
            'panel_third_level_font_color_hover'        => 'panel_font_color',
            'panel_third_level_text_transform'          => 'none',
            'panel_third_level_font'                    => 'panel_font_family',
            'panel_third_level_font_size'               => 'panel_font_size',
            'panel_third_level_font_weight'             => 'normal',
            'panel_third_level_font_weight_hover'       => 'normal',
            'panel_third_level_text_decoration'         => 'none',
            'panel_third_level_text_decoration_hover'   => 'none',
            'panel_third_level_background_hover_from'   => 'transparent',
            'panel_third_level_background_hover_to'     => 'transparent',
            'panel_third_level_padding_left'            => '0px',
            'panel_third_level_padding_right'           => '0px',
            'panel_third_level_padding_top'             => '0px',
            'panel_third_level_padding_bottom'          => '0px',
            'flyout_width'                              => '150px',
            'flyout_menu_background_from'               => '#f1f1f1',
            'flyout_menu_background_to'                 => '#f1f1f1',
            'flyout_border_color'                       => '#ffffff',
            'flyout_border_left'                        => '0px',
            'flyout_border_right'                       => '0px',
            'flyout_border_top'                         => '0px',
            'flyout_border_bottom'                      => '0px',
            'flyout_border_radius_top_left'             => '0px',
            'flyout_border_radius_top_right'            => '0px',
            'flyout_border_radius_bottom_left'          => '0px',
            'flyout_border_radius_bottom_right'         => '0px',
            'flyout_menu_item_divider'                  => 'off',
            'flyout_menu_item_divider_color'            => 'rgba(255, 255, 255, 0.1)',
            'flyout_padding_top'                        => '0px',
            'flyout_padding_right'                      => '0px',
            'flyout_padding_bottom'                     => '0px',
            'flyout_padding_left'                       => '0px',
            'flyout_link_padding_left'                  => '10px',
            'flyout_link_padding_right'                 => '10px',
            'flyout_link_padding_top'                   => '0px',
            'flyout_link_padding_bottom'                => '0px',
            'flyout_link_weight'                        => 'normal',
            'flyout_link_weight_hover'                  => 'normal',
            'flyout_link_height'                        => '35px',
            'flyout_link_text_decoration'               => 'none',
            'flyout_link_text_decoration_hover'         => 'none',
            'flyout_background_from'                    => '#f1f1f1',
            'flyout_background_to'                      => '#f1f1f1',
            'flyout_background_hover_from'              => '#dddddd',
            'flyout_background_hover_to'                => '#dddddd',
            'flyout_link_size'                          => 'font_size',
            'flyout_link_color'                         => 'font_color',
            'flyout_link_color_hover'                   => 'font_color',
            'flyout_link_family'                        => 'font_family',
            'flyout_link_text_transform'                => 'normal',
            'responsive_breakpoint'                     => '600px',
            'responsive_text'                           => 'MENU',
            'line_height'                               => '1.7',
            'z_index'                                   => '999',
            'shadow'                                    => 'off',
            'shadow_horizontal'                         => '0px',
            'shadow_vertical'                           => '0px',
            'shadow_blur'                               => '5px',
            'shadow_spread'                             => '0px',
            'shadow_color'                              => 'rgba(0, 0, 0, 0.1)',
            'transitions'                               => 'off',
            'resets'                                    => 'on',
            'custom_css'                                => '
#{$wrap} #{$menu} {
    /** Custom styles should be added below this line **/
}
#{$wrap} {
    clear: both;
}'
        );

        return apply_filters( "megamenu_themes", $themes );
    }


    /**
     * Return a filtered list of themes
     *
     * @since 1.0
     * @return array
     */
    public function get_themes() {

    }


    /**
     * Sorts a 2d array by the 'title' key
     *
     * @since 1.0
     * @param array $a
     * @param array $b
     */
    private function sort_by_title( $a, $b ) {

        return strcmp( $a['title'], $b['title'] );

    }


    /**
     *
     * @since 1.3.1
     */
    private function is_debug_mode() {

    }


    /**
     * Return the menu CSS. Use the cache if possible.
     *
     * @since 1.0
     */
    public function ajax_get_css() {

    }


    /**
     * Return the menu CSS for use in inline CSS block. Use the cache if possible.
     *
     * @since 1.3.1
     */
    public function get_css() {


    }


    /**
     * Generate and cache the CSS for our menus.
     * The CSS is compiled by scssphp using the file located in /css/megamenu.scss
     *
     * @since 1.0
     * @return string
     * @param boolean $debug_mode (prints error messages to the CSS when enabled)
     */
    public function generate_css() {

    }


    /**
     *
     * @since 1.6.1
     */
    private function save_to_filesystem( $css ) {

    }


    /**
     * Return the path to the megamenu.scss file, look for custom files before
     * loading the core version.
     *
     * @since 1.0
     * @return string
     */
    private function load_scss_file() {

    }

    /**
     * Compiles raw SCSS into CSS for a particular menu location.
     *
     * @since 1.3
     * @return mixed
     * @param array $settings
     * @param string $location
     */
    public function generate_css_for_location( $location, $theme, $menu_id ) {

    }


    /**
     * Generates a SCSS string which includes the variables for a menu theme,
     * for a particular menu location.
     *
     * @since 1.3
     * @return string
     * @param string $theme
     * @param string $location
     * @param int $menu_id
     */
    private function get_complete_scss_for_location( $location, $theme, $menu_id ) {

    }


    /**
     * Returns the menu ID for a specified menu location, defaults to 0
     *
     * @since 1.3
     */
    private function get_menu_id_for_location( $location ) {

        $locations = get_nav_menu_locations();

        $menu_id = isset( $locations[ $location ] ) ? $locations[ $location ] : 0;

        return $menu_id;

    }


    /**
     * Returns the theme settings for a specified location. Defaults to the default theme.
     *
     * @since 1.3
     */
    private function get_theme_settings_for_location( $location ) {


    }


    /**
     * Enqueue public CSS and JS files required by Mega Menu
     *
     * @since 1.0
     */
    public function enqueue_scripts() {

        //wp_enqueue_script( 'hoverIntent' );
        //wp_enqueue_script( 'megamenu', MEGAMENU_BASE_URL . "js/maxmegamenu.js", array('jquery', 'hoverIntent'), MEGAMENU_VERSION, TRUE );

        $params = apply_filters("megamenu_javascript_localisation",
            array(
                "effect" => array(
                    "fade" => array(
                        "in" => array(
                            "animate" => array("opacity" => "show"),
                            "css" => array("display" => "none")
                        ),
                        "out" => array(
                            "animate" => array("opacity" => "hide")
                        ),
                        "speed" => "fast"
                    ),
                    "slide" => array(
                        "in" => array(
                            "animate" => array("height" => "show"),
                            "css" => array("display" => "none")
                        ),
                        "out" => array(
                            "animate" => array("height" => "hide")
                        ),
                        "speed" => "fast"
                    )
                ),
                "timeout" => 300,
                "interval" => 100
            )
        );

        //wp_localize_script( 'megamenu', 'megamenu', $params );

        if ( $this->get_css_output_method() == 'fs' ) {
            $this->enqueue_fs_style();
        }

        if ( $this->get_css_output_method() == 'ajax' ) {
            $this->enqueue_ajax_style();
        }

        //wp_enqueue_style( 'dashicons' );

        do_action( 'megamenu_enqueue_public_scripts' );

    }


    /**
     * Enqueue the stylesheet held on the filesystem.
     *
     * @since 1.6.1
     */
    private function enqueue_fs_style() {

    }


    /**
     * The CSS is generated whenever a menu or a menu theme is saved. A copy of the CSS is always cached using set_transient.
     * If CSS output is set to "Save to File System" then a copy of the CSS is also stored in the uploads directory.
     * Before the static CSS file is enqueued on the site, we compare the contents of the static file to the contents of the
     * transient - they should match. If they don't match then the CSS file on the filesystem has been modified (maliciously or not).
     * In this case we fall back to enqueing the 'safe' CSS via AJAX.
     */
    private function do_css_comparison_before_enqueue() {
    }


    /**
     *
     * @since 1.6.1
     */
    private function set_cached_css( $css ) {

    }


    /**
     * Return the cached css if it exists
     *
     * @since 1.9
     * @return mixed
     */
    private function get_cached_css() {



    }


    /**
     * Delete the cached CSS
     *
     * @since 1.9
     * @return mixed
     */
    public function delete_cache() {

    }


    /**
     * Return the key to use for the CSS transient
     *
     * @since 1.9
     * @return string
     */
    private function get_transient_key() {

    }


    /**
     * Return the filename to use for the stylesheet, ensuring the filename is unique
     * for multi site setups
     *
     * @since 1.6.1
     */
    private function get_css_filename() {

    }


    /**
     * Enqueue the stylesheet via admin-ajax.php
     *
     * @since 1.6.1
     */
    private function enqueue_ajax_style() {

        wp_enqueue_style( 'megamenu', admin_url('admin-ajax.php') . '?action=megamenu_css', false, MEGAMENU_VERSION );

    }


    /**
     * Return the CSS output method, default to filesystem
     *
     * @return string
     */
    private function get_css_output_method() {

    }


    /**
     * Print CSS to <head> to avoid an extra request to WordPress through admin-ajax.
     *
     * @since 1.3.1
     */
    public function head_css() {

    }


    /**
     * Delete language specific transients created when PolyLang is installed
     *
     * @since 1.9
     */
    public function polylang_delete_cache() {

    }


    /**
     * Modify the CSS transient key to make it unique to the current language
     *
     * @since 1.9
     * @return string
     */
    public function polylang_transient_key( $key ) {


    }


    /**
     * Modify the CSS filename to make it unique to the current language
     *
     * @since 1.9
     * @return string
     */
    public function polylang_css_filename( $filename ) {


    }


    /**
     * Delete language specific transients created when WPML is installed
     *
     * @since 1.9
     */
    public function wpml_delete_cache() {


    }


    /**
     * Modify the CSS transient key to make it unique to the current language
     *
     * @since 1.9
     * @return string
     */
    public function wpml_transient_key( $key ) {


    }


    /**
     * Modify the CSS filename to make it unique to the current language
     *
     * @since 1.9
     * @return string
     */
    public function wpml_css_filename( $filename ) {


    }


}

endif;