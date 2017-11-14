<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "artmag_opt";

    $getcategories = get_categories();
    foreach ( $getcategories as $listcategories ) {
        $listedcategories[$listcategories->name] = $listcategories->slug;
    }

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /*
     *
     * --> Action hook examples
     *
     */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');


    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Artmag Options', 'redux-framework-demo' ),
        'page_title'           => __( 'Artmag Options', 'redux-framework-demo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => 'AIzaSyC_DvFJA7SljYfSGUwT-N5VQWhz2iMK-RQ',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => '',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => IMAGES.'/redux-framework.png',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'system_info'          => false,
        // REMOVE

        //'compiler'             => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );



    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
  
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/2035Themes',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/2035Themes',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );



    // Add content after the form.
  
    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */




    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */



    
    Redux::setSection( $opt_name, array(
        'title' => __( 'General', 'redux-framework-demo' ),
        'id'    => 'general',
        'desc'  => __( '', 'redux-framework-demo' ),
        'icon'  => 'el el-home',
        'fields'     => array(   
            array(
                'id'       => 'main-color',
                'type'     => 'color',
                'title'    => __( 'Main Color', 'redux-framework-demo' ),
                'subtitle' => __( 'Pick a main color for the theme (default: #e4c425).', 'redux-framework-demo' ),
                'default'  => '#FFF400',
            ),
            array(
                'id'       => 'site-background',
                'type'     => 'background',
                'output'   => array( 'body' ),
                'title'    => __( 'Body Background', 'redux-framework-demo' ),
                'subtitle' => __( 'Body background with image, color, etc.', 'redux-framework-demo' ),
                'default'   => '#f9f9f9',
            ),             
            array(
                'id' => 'sidebar-type',
                'type' => 'select',  
                'title' => __('Sidebar Position', 'redux-framework-demo'),
                'subtitle' => __('Sidebar Position Layout', 'redux-framework-demo'),
                'options' => array( 'right' => 'Right Sidebar', 'left' => 'Left Sidebar', 'none' => 'No Sidebar'),
                'default' => 'right',
            ),
            array(
                'id' => 'blog_sidebar',
                'type' => 'select',
                'required' => array('sidebar-type', 'not', 'none'),
                'title' => __('Home Blog Sidebar', 'BlogOptFramework'),
                'subtitle' => __('Select your blog sidebar', 'redux-framework-demo'),
                'desc' => __('', 'BlogOptFramework'),
                'data'      => 'sidebars',
                'default' => 'sidebar-1',
            ),

            array(
                'id' => 'blog_featured_image',
                'type' => 'select',
                'title' => __('Post Featured Image', 'BlogOptFramework'),
                'subtitle' => __('Select featured image type', 'redux-framework-demo'),
                'desc' => __('', 'BlogOptFramework'),
                'options' => array( 'full' => 'Full Image', 'half' => 'Half Image', 'fullwidth' => 'Full Screen Width Image'),
                'default' => 'full',
            ),



            array(
                'id' => 'page-sidebar-type',
                'type' => 'select',  
                'title' => __('Page Sidebar Position', 'redux-framework-demo'),
                'subtitle' => __('Page Sidebar Position Layout', 'redux-framework-demo'),
                'options' => array( 'right' => 'Right Sidebar', 'left' => 'Left Sidebar', 'none' => 'No Sidebar'),
                'default' => 'none',
            ),
            array(
                'id' => 'page-blog_sidebar',
                'type' => 'select',
                'required' => array('page-sidebar-type', 'not', 'none'),
                'title' => __('Page Blog Sidebar', 'BlogOptFramework'),
                'subtitle' => __('Select your page sidebar', 'redux-framework-demo'),
                'data'      => 'sidebars',
                'default' => 'sidebar-1',
            ),
            array(
                'id'       => 'page-comment-visibility',
                'type'     => 'switch',
                'title'    => __( 'Page Comment Show', 'redux-framework-demo' ),
                'subtitle' => __( 'Page Comment Show (Default : Hide)', 'redux-framework-demo' ),
                'default'  => true,
            ),
            array(
                'id'       => 'instagram-bar-visibility',
                'type'     => 'switch',
                'title'    => __( 'Footer Instagram Bar', 'redux-framework-demo' ),
                'subtitle' => __( 'Footer Instagram Bar(Default : Show)', 'redux-framework-demo' ),
                'default'  => true,
            ),
            array(
                'id' => 'instagram-subtitle',
                'required'    => array('instagram-bar-visibility', 'equals', true),
                'type' => 'text',
                'title' => __('Instagram Subtitle', 'redux-framework-demo'),
                'subtitle' => __('Instagram Subtitle Text', 'redux-framework-demo'),
                'default' => 'KNOW US BETTER'
            ),



        ),
       ) );

    
    Redux::setSection( $opt_name, array(
        'title' => __( 'Post Settings', 'redux-framework-demo' ),
        'id'    => 'post-settings',
        'desc'  => __( '', 'redux-framework-demo' ),
        'icon'  => 'el el-edit',
        'fields'     => array(
           

  
            array(
                'id' => 'index-post-type',
                'type' => 'select',  
                'title' => __('Post Type', 'redux-framework-demo'),
                'subtitle' => __('Index Post Type', 'redux-framework-demo'),
                'options' => array( 'list' => 'List', 'full' => 'Full'),
                'default' => 'list',
            ),

            array(
                'id' => 'post-no-image',
                'type' => 'media',
                'title' => __('No Image', 'redux-framework-demo'),
                'compiler' => 'true',
                'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'subtitle' => __('Upload Post No Image', 'redux-framework-demo'),
            ),  

            array(
                'id'       => 'index-list-share-visibility',
                'type'     => 'switch',
                'title'    => __( 'Share Visibility', 'redux-framework-demo' ),
                'subtitle' => __( 'Share Visibility (Default : Show)', 'redux-framework-demo' ),
                'default'  => true,
            ),

            array(
                'id'       => 'index-list-cat-visibility',
                'type'     => 'switch',
                'title'    => __( 'Category Visibility', 'redux-framework-demo' ),
                'subtitle' => __( 'Category Visibility (Default : Show)', 'redux-framework-demo' ),
                'default'  => true,
            ),

            array(
                'id'       => 'featured-image-cropping',
                'type'     => 'switch',
                'title'    => __( 'Image Crop', 'redux-framework-demo' ),
                'subtitle' => __( 'Image Crop (Default : Crop)', 'redux-framework-demo' ),
                'default'  => true,
            ),


            array(
                'id'       => 'index-content-full',
                'type'     => 'switch',
                'title'    => __( 'Show Full Post Content ', 'redux-framework-demo' ),
                'subtitle' => __( 'Show Full Post Content  (Default : False)', 'redux-framework-demo' ),
                'default'  => false,
            ),


            array(
                'id'       => 'index-read-more',
                'type'     => 'switch',
                'title'    => __( 'Read More Visibility', 'redux-framework-demo' ),
                'subtitle' => __( 'Read More Visibility (Default : Hide)', 'redux-framework-demo' ),
                'default'  => false,
            ),


             array(
                'id'       => 'single-post',
                'type'     => 'section',
                'title'    => __( 'Single Post Settings', 'redux-framework-demo' ),
                'indent'   => true, 
            ),  

            array(
                'id'       => 'single-featured-image',
                'type'     => 'switch',
                'title'    => __( 'Featured Image in Post Page', 'redux-framework-demo' ),
                'subtitle' => __( 'Featured Image in Post Page (Default : Show)', 'redux-framework-demo' ),
                'default'  => true,
            ),

            array(
                'id'       => 'single-author',
                'type'     => 'switch',
                'title'    => __( 'Single Author Info Box', 'redux-framework-demo' ),
                'subtitle' => __( 'Single Author Info Box (Default : Show)', 'redux-framework-demo' ),
                'default'  => true,
            ),

            array(
                'id'       => 'single-postview',
                'type'     => 'switch',
                'title'    => __( 'Single Post Views', 'redux-framework-demo' ),
                'subtitle' => __( 'Single Post Views (Default : Show)', 'redux-framework-demo' ),
                'default'  => true,
            ),

            array(
                'id'       => 'link-main-color',
                'type'     => 'color',
                'title'    => __( 'Link Color', 'redux-framework-demo' ),
                'subtitle' => __( 'Pick a main color for Post link (default: #222).', 'redux-framework-demo' ),
                'default'  => '#222',
            ),
            array(
                'id'       => 'link-background',
                'type'     => 'color',
                'title'    => __( 'Link Background', 'redux-framework-demo' ),
                'subtitle' => __( 'Link background', 'redux-framework-demo' ),
                'default'   => '#FFF400',
            ),




        ),
    ));


    
    Redux::setSection( $opt_name, array(
        'title' => __( 'Header', 'redux-framework-demo' ),
        'id'    => 'header',
        'desc'  => __( '', 'redux-framework-demo' ),
        'icon'  => 'el el-website',
        'fields'     => array(
            array(
                'id'       => 'head-style',
                'type'     => 'section',
                'title'    => __( '[Header] Style', 'redux-framework-demo' ),
                'indent'   => true, 
            ), 
            array(
                'id' => 'head-style-type',
                'type' => 'select',  
                'title' => __('Header Background Type', 'redux-framework-demo'),
                'subtitle' => __('Header Background Type', 'redux-framework-demo'),
                'options' => array( 'colored' => 'Colored', 'image' => 'Image', 'video' => 'Video'),
                'default' => 'colored',
            ),
            array(
                'id' => 'head-image',
                'required'    => array('head-style-type', 'equals', "image"),
                'type' => 'media',
                'compiler' => 'true',
                'mode' => false,
                'title' => __('Header Background Image', 'redux-framework-demo'),
                'subtitle' => __('Upload Background Image', 'redux-framework-demo'),
            ),
            array(
                'id' => 'head-video',
                'required'    => array('head-style-type', 'equals', "video"),
                'type' => 'text',
                'title' => __('Video Background Url', 'redux-framework-demo'),
                'desc' => __('You can use youtube url, vimeo url or self-hosted video. If you are using self hosted video please upload your .mp4 videos .webm and .ogg versions to same folder with same name!', 'redux-framework-demo'),
                'subtitle' => __('Video Background', 'redux-framework-demo'),
            ),
            array(
                'id' => 'head-video-image',
                'required'    => array('head-style-type', 'equals', "video"),
                'type' => 'media',
                'compiler' => 'true',
                'mode' => false,
                'title' => __('Mobile Fallback Image', 'redux-framework-demo'),
                'subtitle' => __('Upload Fallback Image', 'redux-framework-demo'),
            ),
            array(
                'id'       => 'head-video-overlay',
                'required'    => array('head-style-type', 'equals', "video"),
                'type'     => 'color_rgba',
                'title'    => __( 'Header Video Overlay Color', 'redux-framework-demo' ),
                'subtitle' => __( 'Overlay Color', 'redux-framework-demo' ),
                'output' => array('background-color' => '.video-content'),
            ),
            array(
                'id'       => 'head-colored',
                'required'    => array('head-style-type', 'equals', "colored"),
                'type'     => 'color',
                'transparent' => false,
                'title'    => __( 'Header Background Color', 'redux-framework-demo' ),
                'subtitle' => __( 'Background Color', 'redux-framework-demo' ),
                'default'  => '#FFFFFF',
            ),
            array(
                'id'       => 'head-color-type',
                'type'     => 'switch',
                'title'    => __( 'Background Color Type', 'redux-framework-demo' ),
                'subtitle' => __( 'Background Color Type(Default : Light)', 'redux-framework-demo' ),
                'on'       => 'Light',
                'off'      => 'Dark',
                'default'  => true,
            ),
            array(
                'id'       => 'navigation',
                'type'     => 'section',
                'title'    => __( '[Header] Navigation', 'redux-framework-demo' ),
                'indent'   => true, 
            ),          
            array(
                'id'       => 'navigation-visibility',
                'type'     => 'switch',
                'title'    => __( 'Navigation Visibility', 'redux-framework-demo' ),
                'subtitle' => __( 'Navigation Visibility (Default : Show)', 'redux-framework-demo' ),
                'default'  => true,
            ),  
            array(
                'id' => 'nav-back',
                'type' => 'select',  
                'title' => __('Navigation Background Type', 'redux-framework-demo'),
                'subtitle' => __('Navigation Background Type', 'redux-framework-demo'),
                'options' => array( 'image' => 'Image', 'color' => 'Color'),
                'default' => 'image',
            ),
            array(
                'id' => 'nav-image',
                'required'    => array('nav-back', 'equals', "image"),
                'type' => 'media',
                'compiler' => 'true',
                'mode' => false,
                'title' => __('Navigation Image', 'redux-framework-demo'),
                'subtitle' => __('Upload Navigation Image', 'redux-framework-demo'),
                'default'  => array(
                    'url'=> THEMEROOT.'/images/pattern.png'
                ),
            ),  
            array(
                'id'       => 'nav-color',
                'required'    => array('nav-back', 'equals', "color"),
                'type'     => 'color',
                'title'    => __( 'Navigation Background Color', 'redux-framework-demo' ),
                'subtitle' => __( 'Pick a navigation background color', 'redux-framework-demo' ),
                'default'  => '#f5f5f5',
            ),
            array(
                'id'       => 'headerslider',
                'type'     => 'section',
                'title'    => __( '[Header] Slider', 'redux-framework-demo' ),
                'indent'   => true, 
            ),          
            array(
                'id'       => 'header-slider',
                'type'     => 'switch',
                'title'    => __( 'Header Slider Visibility', 'redux-framework-demo' ),
                'subtitle' => __( 'Header Slider Visibility (Default : Show)', 'redux-framework-demo' ),
                'default'  => false,
            ),
            array(
                'id' => 'header-slider-category',
                'type' => 'select',  
                'title' => __('Header Slider Category', 'redux-framework-demo'),
                'subtitle' => __('Select category for header slider', 'redux-framework-demo'),
                'options' => $listedcategories,
            ),
            array(
                'id'            => 'header-slider-number',
                'type'          => 'slider',
                'title'         => __( 'Header Slider Number', 'redux-framework-demo' ),
                'desc'          => __( 'Select header slider number', 'redux-framework-demo' ),
                'default'       => 4,
                'min'           => 2,
                'step'          => 1,
                'max'           => 10,
                'display_value' => 'label'
            ),
            array(
                'id'       => 'topmenu',
                'type'     => 'section',
                'title'    => __( 'Top Menu', 'redux-framework-demo' ),
                'indent'   => true, 
            ),
            array(
                'id'       => 'top-menu',
                'type'     => 'switch',
                'title'    => __( 'Top Menu Visibility', 'redux-framework-demo' ),
                'subtitle' => __( 'Top Menu Visibility (Default : Hide)', 'redux-framework-demo' ),
                'default'  => false,
            ),
            array(
                'id' => 'top-menu-textly',
                'required'    => array('top-menu', 'equals', true),
                'type' => 'text',
                'title' => __('Top Menu Text', 'redux-framework-demo'),
                'subtitle' => __('', 'redux-framework-demo'),
                'default' => 'Monthly Publishing Art Magazine'
            ),
            array(
                'id'       => 'author-s-info',
                'type'     => 'section',
                'title'    => __( '[Header] Author Info', 'redux-framework-demo' ),
                'indent'   => true, 
            ),          
            array(
                'id'       => 'author-info-visibility',
                'type'     => 'switch',
                'title'    => __( 'Author Info Visibility', 'redux-framework-demo' ),
                'subtitle' => __( 'Author Info Visibility (Default : Show)', 'redux-framework-demo' ),
                'default'  => true,
            ),  
            array(
                'id' => 'author-image',
                'required'    => array('author-info-visibility', 'equals', true),
                'type' => 'media',
                'compiler' => 'true',
                'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'title' => __('Author Image', 'redux-framework-demo'),
                'subtitle' => __('Upload Author Image', 'redux-framework-demo'),
                'default'  => array(
                    'url'=> THEMEROOT.'/images/user.jpg'
                ),
            ),  
            array(
                'id' => 'author-name',
                'required'    => array('author-info-visibility', 'equals', true),
                'type' => 'text',
                'title' => __('Author Title', 'redux-framework-demo'),
                'subtitle' => __('Author Name', 'redux-framework-demo'),
                'default' => 'SARAH WILLIAMS'
            ),      
            array(
                'id' => 'author-info',
                'required'    => array('author-info-visibility', 'equals', true),
                'type' => 'textarea',
                'title' => __('Author Info', 'redux-framework-demo'),
                'subtitle' => __('Author Info', 'redux-framework-demo'),
                'default' => 'Once, long ago, I took intro in a certain skire then'
            ),  
            array(
                'id' => 'author-link',
                'required'    => array('author-info-visibility', 'equals', true),
                'type' => 'text',
                'title' => __('Author Profile Link', 'redux-framework-demo'),
                'subtitle' => __('Author Profile Link', 'redux-framework-demo'),
                'default' => 'http://2035themes.com/artmag/user/admin'
            ), 
            
           array(
                'id'       => 'social-media',
                'type'     => 'section',
                'title'    => __( '[Header] Social Media', 'redux-framework-demo' ),
                'indent'   => true, 
            ),          
            array(
                'id'       => 'social-media-visibility',
                'type'     => 'switch',
                'title'    => __( 'Social Media Visibility', 'redux-framework-demo' ),
                'subtitle' => __( 'Social Media Visibility (Default : Show)', 'redux-framework-demo' ),
                'default'  => true,
            ),
           array(
                'id' => 'behance-header',
                'required'    => array('social-media-visibility', 'equals', true),
                'type' => 'text',
                'title' => __('Behance', 'redux-framework-demo'),
                'desc' => __('Behance URL', 'redux-framework-demo'),
                'subtitle' => __('Behance URL', 'redux-framework-demo'),
                'default' => ''
            ),
           array(
                'id' => 'blogger-header',
                'required'    => array('social-media-visibility', 'equals', true),
                'type' => 'text',
                'title' => __('Blogger', 'redux-framework-demo'),
                'desc' => __('Blogger URL', 'redux-framework-demo'),
                'subtitle' => __('Blogger URL', 'redux-framework-demo'),
                'default' => ''
            ),
           array(
                'id' => 'dribbble-header',
                'required'    => array('social-media-visibility', 'equals', true),
                'type' => 'text',
                'title' => __('Dribbble', 'redux-framework-demo'),
                'desc' => __('Dribbble URL', 'redux-framework-demo'),
                'subtitle' => __('Dribbble URL', 'redux-framework-demo'),
                'default' => ''
            ),
           array(
                'id' => 'facebook-header',
                'required'    => array('social-media-visibility', 'equals', true),
                'type' => 'text',
                'title' => __('Facebook', 'redux-framework-demo'),
                'desc' => __('Facebook URL', 'redux-framework-demo'),
                'subtitle' => __('Facebook URL', 'redux-framework-demo'),
                'default' => 'https://facebook.com/2035themes'
            ),                                         
            array(
                'id' => 'flickr-header',
                'required'    => array('social-media-visibility', 'equals', true),
                'type' => 'text',
                'title' => __('Flickr', 'redux-framework-demo'),
                'desc' => __('Flickr URL', 'redux-framework-demo'),
                'subtitle' => __('Flickr URL', 'redux-framework-demo'),
                'default' => 'https://flickr.com/2035themes'
            ),                                          
            array(
                'id' => 'foursquare-header',
                'required'    => array('social-media-visibility', 'equals', true),
                'type' => 'text',
                'title' => __('Foursquare', 'redux-framework-demo'),
                'desc' => __('Foursquare URL', 'redux-framework-demo'),
                'subtitle' => __('Foursquare URL', 'redux-framework-demo'),
                'default' => ''
            ),  
            array(
                'id' => 'google-plus-header',
                'required'    => array('social-media-visibility', 'equals', true),
                'type' => 'text',
                'title' => __('Google + URL', 'redux-framework-demo'),
                'desc' => __('Google + URL', 'redux-framework-demo'),
                'subtitle' => __('Google + URL', 'redux-framework-demo'),
                'default' => ''
            ),                                        
            array(
                'id' => 'instagram-header',
                'required'    => array('social-media-visibility', 'equals', true),
                'type' => 'text',
                'title' => __('instagram', 'redux-framework-demo'),
                'desc' => __('instagram URL', 'redux-framework-demo'),
                'subtitle' => __('instagram URL', 'redux-framework-demo'),
                'default' => ''
            ),                                       
            array(
                'id' => 'linkedin-header',
                'required'    => array('social-media-visibility', 'equals', true),
                'type' => 'text',
                'title' => __('Linkedin', 'redux-framework-demo'),
                'desc' => __('Linkedin URL', 'redux-framework-demo'),
                'subtitle' => __('Linkedin URL', 'redux-framework-demo'),
                'default' => ''
            ),                                        
            array(
                'id' => 'medium-header',
                'required'    => array('social-media-visibility', 'equals', true),
                'type' => 'text',
                'title' => __('Medium', 'redux-framework-demo'),
                'desc' => __('Medium URL', 'redux-framework-demo'),
                'subtitle' => __('Medium URL', 'redux-framework-demo'),
                'default' => ''
            ),                                        
            array(
                'id' => 'pinterest-header',
                'required'    => array('social-media-visibility', 'equals', true),
                'type' => 'text',
                'title' => __('Pinterest', 'redux-framework-demo'),
                'desc' => __('Pinterest URL', 'redux-framework-demo'),
                'subtitle' => __('Pinterest URL', 'redux-framework-demo'),
                'default' => ''
            ),                                       
            array(
                'id' => 'skype-header',
                'required'    => array('social-media-visibility', 'equals', true),
                'type' => 'text',
                'title' => __('Skype', 'redux-framework-demo'),
                'desc' => __('Skype URL', 'redux-framework-demo'),
                'subtitle' => __('Skype URL', 'redux-framework-demo'),
                'default' => ''
            ),                                       
            array(
                'id' => 'soundcloud-header',
                'required'    => array('social-media-visibility', 'equals', true),
                'type' => 'text',
                'title' => __('Soundcloud', 'redux-framework-demo'),
                'desc' => __('Soundcloud URL', 'redux-framework-demo'),
                'subtitle' => __('Soundcloud URL', 'redux-framework-demo'),
                'default' => ''
            ), 
            array(
                'id' => 'tumblr-header',
                'required'    => array('social-media-visibility', 'equals', true),
                'type' => 'text',
                'title' => __('Tumblr', 'redux-framework-demo'),
                'desc' => __('Tumblr URL', 'redux-framework-demo'),
                'subtitle' => __('Tumblr URL', 'redux-framework-demo'),
                'default' => 'https://tumblr.com/2035themes'
            ),
            array(
                'id' => 'twitter-header',
                'required'    => array('social-media-visibility', 'equals', true),
                'type' => 'text',
                'title' => __('Twitter', 'redux-framework-demo'),
                'desc' => __('Twitter URL', 'redux-framework-demo'),
                'subtitle' => __('Twitter URL', 'redux-framework-demo'),
                'default' => 'https://twitter.com/2035themes'
            ),
            array(
                'id' => 'vimeo-header',
                'required'    => array('social-media-visibility', 'equals', true),
                'type' => 'text',
                'title' => __('Vimeo', 'redux-framework-demo'),
                'desc' => __('Vimeo URL', 'redux-framework-demo'),
                'subtitle' => __('Vimeo URL', 'redux-framework-demo'),
                'default' => ''
            ),
            array(
                'id' => 'whatsapp-header',
                'required'    => array('social-media-visibility', 'equals', true),
                'type' => 'text',
                'title' => __('Whatsapp', 'redux-framework-demo'),
                'desc' => __('Whatsapp URL', 'redux-framework-demo'),
                'subtitle' => __('Whatsapp URL', 'redux-framework-demo'),
                'default' => ''
            ),
            array(
                'id' => 'youtube-header',
                'required'    => array('social-media-visibility', 'equals', true),
                'type' => 'text',
                'title' => __('Youtube', 'redux-framework-demo'),
                'desc' => __('Youtube Username', 'redux-framework-demo'),
                'subtitle' => __('Youtube Username', 'redux-framework-demo'),
                'default' => ''
            ),
            array(
                'id' => 'custom-social-site-1',
                'required'    => array('social-media-visibility', 'equals', true),
                'type' => 'section',
                'title' => __('Custom Social Site 1', 'redux-framework-demo'),
                'subtitle' => __('Custom Social Site 1', 'redux-framework-demo'),
                'indent' => true // Indent all options below until the next 'section' option is set.
            ),      
            array(
                'id' => 'custom-site-name-1',
                'required'    => array('social-media-visibility', 'equals', true),
                'type' => 'text',
                'title' => __('Custom Site Name - 1', 'redux-framework-demo'),
                'desc' => __('Custom Site Name', 'redux-framework-demo'),
                'subtitle' => __('Write Custom Site Name (Example : Bloglovin, Rolling Stone)', 'redux-framework-demo'),
                'default' => ''
            ),       
            array(
                'id' => 'custom-site-url-1',
                'required'    => array('social-media-visibility', 'equals', true),
                'type' => 'text',
                'title' => __('Custom Site URL - 1', 'redux-framework-demo'),
                'desc' => __('Custom Site URL', 'redux-framework-demo'),
                'subtitle' => __('Write Custom Site URL', 'redux-framework-demo'),
                'default' => ''
            ),  
            array(
                'id' => 'custom-site-logo-1',
                'required'    => array('social-media-visibility', 'equals', true),
                'type' => 'media',
                'title' => __('Custom Site Logo - 1', 'redux-framework-demo'),
                'compiler' => 'true',
                'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc' => __('Logo', 'redux-framework-demo'),
                'subtitle' => __('Upload Logo (16px x 16px)', 'redux-framework-demo'),
            ),    

            array(
                'id' => 'custom-social-site-2',
                'required'    => array('social-media-visibility', 'equals', true),
                'type' => 'section',
                'title' => __('Custom Social Site 2', 'redux-framework-demo'),
                'subtitle' => __('Custom Social Site 2', 'redux-framework-demo'),
                'indent' => true // Indent all options below until the next 'section' option is set.
            ),    
            array(
                'id' => 'custom-site-name-2',
                'required'    => array('social-media-visibility', 'equals', true),
                'type' => 'text',
                'title' => __('Custom Site Name - 2', 'redux-framework-demo'),
                'desc' => __('Custom Site Name', 'redux-framework-demo'),
                'subtitle' => __('Write Custom Site Name (Example : Bloglovin, Rolling Stone)', 'redux-framework-demo'),
                'default' => ''
            ),       
            array(
                'id' => 'custom-site-url-2',
                'required'    => array('social-media-visibility', 'equals', true),
                'type' => 'text',
                'title' => __('Custom Site URL - 2', 'redux-framework-demo'),
                'desc' => __('Custom Site URL', 'redux-framework-demo'),
                'subtitle' => __('Write Custom Site URL', 'redux-framework-demo'),
                'default' => ''
            ),  
            array(
                'id' => 'custom-site-logo-2',
                'required'    => array('social-media-visibility', 'equals', true),
                'type' => 'media',
                'title' => __('Custom Site Logo - 2', 'redux-framework-demo'),
                'compiler' => 'true',
                'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc' => __('Logo', 'redux-framework-demo'),
                'subtitle' => __('Upload Logo (16px x 16px)', 'redux-framework-demo'),
            ),  
            array(
                'id' => 'custom-social-site-3',
                'required'    => array('social-media-visibility', 'equals', true),
                'type' => 'section',
                'title' => __('Custom Social Site 3', 'redux-framework-demo'),
                'subtitle' => __('Custom Social Site 3', 'redux-framework-demo'),
                'indent' => true // Indent all options below until the next 'section' option is set.
            ),      
            array(
                'id' => 'custom-site-name-3',
                'required'    => array('social-media-visibility', 'equals', true),
                'type' => 'text',
                'title' => __('Custom Site Name - 3', 'redux-framework-demo'),
                'desc' => __('Custom Site Name', 'redux-framework-demo'),
                'subtitle' => __('Write Custom Site Name (Example : Bloglovin, Rolling Stone)', 'redux-framework-demo'),
                'default' => ''
            ),       
            array(
                'id' => 'custom-site-url-3',
                'required'    => array('social-media-visibility', 'equals', true),
                'type' => 'text',
                'title' => __('Custom Site URL - 3', 'redux-framework-demo'),
                'desc' => __('Custom Site URL', 'redux-framework-demo'),
                'subtitle' => __('Write Custom Site URL', 'redux-framework-demo'),
                'default' => ''
            ),  
            array(
                'id' => 'custom-site-logo-3',
                'required'    => array('social-media-visibility', 'equals', true),
                'type' => 'media',
                'title' => __('Custom Site Logo - 3', 'redux-framework-demo'),
                'compiler' => 'true',
                'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc' => __('Logo', 'redux-framework-demo'),
                'subtitle' => __('Upload Logo (16px x 16px)', 'redux-framework-demo'),
            ), 



            array(
                'id'       => 'search-v',
                'type'     => 'section',
                'title'    => __( '[Header] Search', 'redux-framework-demo' ),
                'indent'   => true, 
            ),          
            array(
                'id'       => 'search-visibility',
                'type'     => 'switch',
                'title'    => __( 'Search Visibility', 'redux-framework-demo' ),
                'subtitle' => __( 'Search Visibility (Default : Show)', 'redux-framework-demo' ),
                'default'  => true,
            ), 




            ),) );






    Redux::setSection( $opt_name, array(
        'title'      => __( 'Logo, Favicon & Footer', 'redux-framework-demo' ),
        'id'         => 'logo-favicon',
        'icon'  => 'el el-upload',
        'subsection' => false,
        'fields'     => array(
            array(
                'id'       => 'logo-type',
                'type'     => 'select',
                'title'    => __( 'Header Logo Type', 'redux-framework-demo' ),
                'subtitle' => __( 'Select Image or Text', 'redux-framework-demo' ),
                'desc'     => __( 'Image : You Can Upload Logo Image . Text : Your Wordpress Title show up text', 'redux-framework-demo' ),
                //Must provide key => value pairs for select options
                'options'  => array(
                    'image' => 'Image',
                    'text' => 'Text',
                ),
                'default'  => 'text'
            ),
            array(
                'id' => 'logo',
                'required'    => array('logo-type', 'equals', 'image'),
                'type' => 'media',
                'title' => __('Logo', 'redux-framework-demo'),
                'compiler' => 'true',
                'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc' => __('Upload Header Logo', 'redux-framework-demo'),
            ), 
            array(
                'id' => 'logo-custom-title',
                'required'    => array('logo-type', 'equals', 'text'),
                'type' => 'text',
                'title' => __('Logo Custom Title', 'redux-framework-demo'),
                'desc' => __('Logo Custom Title', 'redux-framework-demo'),
                'default' => 'ARTMAG'
            ), 
            array(
                'id' => 'logo-custom-description',
                'required'    => array('logo-type', 'equals', 'text'),
                'type' => 'text',
                'title' => __('Logo Custom Description', 'redux-framework-demo'),
                'desc' => __('Logo Custom Description', 'redux-framework-demo'),
                'default' => ''
            ),
            array(
                'id'       => 'footer-logo-type',
                'type'     => 'select',
                'title'    => __( 'Footer Logo Type', 'redux-framework-demo' ),
                'subtitle' => __( 'Select Image or Text', 'redux-framework-demo' ),
                'desc'     => __( 'Image : You Can Upload Logo Image . Text : Your Wordpress Title show up text', 'redux-framework-demo' ),
                //Must provide key => value pairs for select options
                'options'  => array(
                    'image' => 'Image',
                    'text' => 'Text',
                ),
                'default'  => 'text'
            ),
            array(
                'id' => 'footer-logo',
                'required'    => array('footer-logo-type', 'equals', 'image'),
                'type' => 'media',
                'title' => __('Footer Logo', 'redux-framework-demo'),
                'compiler' => 'true',
                'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc' => __('Upload Footer Logo', 'redux-framework-demo'),
            ), 
            array(
                'id' => 'footer-logo-custom-title',
                'required'    => array('footer-logo-type', 'equals', 'text'),
                'type' => 'text',
                'title' => __('Footer Logo Custom Title', 'redux-framework-demo'),
                'desc' => __('Logo Custom Title', 'redux-framework-demo'),
                'default' => 'ARTMAG'
            ), 
            array(
                'id' => 'footer-logo-custom-description',
                'required'    => array('footer-logo-type', 'equals', 'text'),
                'type' => 'text',
                'title' => __('Footer Logo Custom Description', 'redux-framework-demo'),
                'desc' => __('Logo Custom Description', 'redux-framework-demo'),
                'default' => ''
            ),
            array(
                'id' => 'favicon',
                'type' => 'media',
                'title' => __('Favicon', 'redux-framework-demo'),
                'compiler' => 'true',
                'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc' => __('<a target="_blank" href="http://en.wikipedia.org/wiki/Favicon">What is Favicon?</a>', 'redux-framework-demo'),
                'subtitle' => __('Upload Favicon', 'redux-framework-demo'),
            ), 
             array(
                'id' => 'ipad_retina_icon',
                'type' => 'media',
                'title' => __('Ipad Retina Icon (144x144)', 'redux-framework-demo'),
                'compiler' => 'true',
                'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc' => __('Ipad Retina Icon (144x144)', 'redux-framework-demo'),
                'subtitle' => __('Upload Ipad Retina Icon', 'redux-framework-demo'),
            ),   
             array(
                'id' => 'iphone_icon_retina',
                'type' => 'media',
                'title' => __('Iphone Retina Icon (114x114)', 'redux-framework-demo'),
                'compiler' => 'true',
                'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc' => __('Iphone Retina Icon (114x114)', 'redux-framework-demo'),
                'subtitle' => __('Upload Iphone Retina Icon', 'redux-framework-demo'),
            ), 
              array(
                'id' => 'ipad_icon',
                'type' => 'media',
                'title' => __('Ipad Icon (72x72)', 'redux-framework-demo'),
                'compiler' => 'true',
                'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc' => __('Ipad Icon (72x72)', 'redux-framework-demo'),
                'subtitle' => __('Upload Ipad Icon', 'redux-framework-demo'),
            ), 
              array(
                'id' => 'iphone_icon',
                'type' => 'media',
                'title' => __('Iphone Icon (57x57)', 'redux-framework-demo'),
                'compiler' => 'true',
                'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc' => __('Iphone Icon (57x57)', 'redux-framework-demo'),
                'subtitle' => __('Upload Iphone Icon', 'redux-framework-demo'),
            ),     
    
        ),
        ) );

        Redux::setSection( $opt_name, array(
            'title'  => __( 'Typography', 'redux-framework-demo' ),
            'id'     => 'typography',
            'icon'   => 'el el-font',
            'fields' => array(


                    array(
                        'id' => 'head-font-type',
                        'type' => 'select',  
                        'title' => __('Primary Heading Font', 'redux-framework-demo'),
                        'subtitle' => __('Heading Font', 'redux-framework-demo'),
                        'options' => array( 'custom-head' => 'Custom Font', 'custom-head-google' => 'Google Fonts'),
                        'default' => 'custom-head',
                    ),
                    array(
                        'id'          => 'head-font-google',
                        'type'        => 'typography',
                        'title'       => __( 'Primary Heading Google Font', 'redux-framework-demo' ),
                        'font-backup' => false,
                        'font-size' => false,
                        'output'      => array( 'h1#comments,.big-title h1,.newsletter-left input,.logo-text h1' ),
                        'font-weight' => true,
                        'font-style' => false,
                        'text-align' => false,
                        'line-height'   => false,
                        'color'   => false,
                        'letter-spacing'=> false,  // Defaults to false
                        'subsets'  => true,
                        'all_styles'  => true,
                        'subtitle'    => __( 'Typography option with each property can be called individually.', 'redux-framework-demo' ),
                        'default'     => array(
                            'font-family' => 'Open Sans Condensed',
                            'google'      => true,
                            'font-weight'      => 300,
                        ),
                        'required' => array('head-font-type', 'equals', 'custom-head-google'),
                    ),
                    array(
                        'id' => 'custom-head-name',
                        'required'    => array('head-font-type', 'equals', 'custom-head'),
                        'type' => 'text',
                        'title' => __('Head Font Name', 'redux-framework-demo'),
                        'subtitle' => __('Head Font Name', 'redux-framework-demo'),
                        'default' => "Bebas Neue",
                    ),
                    array(
                        'id' => 'head-eot',
                        'required'    => array('head-font-type', 'equals', 'custom-head'),
                        'type' => 'text',
                        'title' => __('Custom Head Font (eot)', 'redux-framework-demo'),
                        'desc' => __('Custom Head Font (eot) URL', 'redux-framework-demo'),
                        'subtitle' => __('Custom Head Font (eot) URL', 'redux-framework-demo'),
                        'default' => THEMEROOT."/fonts/BebasNeueBook.eot",
                    ),                     
                    array(
                        'id' => 'head-iefix',
                        'required'    => array('head-font-type', 'equals', 'custom-head'),
                        'type' => 'text',
                        'title' => __('Custom Head Font (eot?#iefix)', 'redux-framework-demo'),
                        'desc' => __('Custom Head Font (eot?#iefix) URL', 'redux-framework-demo'),
                        'subtitle' => __('Custom Head Font (eot?#iefix) URL', 'redux-framework-demo'),
                        'default' => THEMEROOT."/fonts/BebasNeueBook.eot?#iefix",
                    ),    
                    array(
                        'id' => 'head-woff',
                        'required'    => array('head-font-type', 'equals', 'custom-head'),
                        'type' => 'text',
                        'title' => __('Custom Head Font (woff)', 'redux-framework-demo'),
                        'desc' => __('Custom Head Font (woff) URL', 'redux-framework-demo'),
                        'subtitle' => __('Custom Head Font (woff) URL', 'redux-framework-demo'),
                        'default' => THEMEROOT."/fonts/BebasNeueBook.woff",
                    ),                      
                    array(
                        'id' => 'head-ttf',
                        'required'    => array('head-font-type', 'equals', 'custom-head'),
                        'type' => 'text',
                        'title' => __('Custom Head Font (ttf)', 'redux-framework-demo'),
                        'desc' => __('Custom Head Font (ttf) URL', 'redux-framework-demo'),
                        'subtitle' => __('Custom Head Font (ttf) URL', 'redux-framework-demo'),
                        'default' => THEMEROOT."/fonts/BebasNeueBook.ttf",
                    ),                       
                    array(
                        'id' => 'head-svg',
                        'required'    => array('head-font-type', 'equals', 'custom-head'),
                        'type' => 'text',
                        'title' => __('Custom Head Font (svg)', 'redux-framework-demo'),
                        'desc' => __('Custom Head Font (svg) URL', 'redux-framework-demo'),
                        'subtitle' => __('Custom Head Font (svg) URL', 'redux-framework-demo'),
                        'default' => THEMEROOT."/fonts/BebasNeueBook.svg#BebasNeueBook",
                    ), 
/* Body */
                    array(
                        'id' => 'body-font-type',
                        'type' => 'select',  
                        'title' => __('Body Typography Type', 'redux-framework-demo'),
                        'subtitle' => __('Body Typography Font', 'redux-framework-demo'),
                        'options' => array( 'custom-body' => 'Custom Font', 'custom-body-google' => 'Google Fonts'),
                        'default' => 'custom-body-google',
                    ),
                    array(
                        'id'       => 'body-font',
                        'type'     => 'typography',
                        'title'    => __( 'Body Typography', 'redux-framework-demo' ),
                        'output'      => array('body'),
                        'text-align'      => false,
                        'subtitle' => __( 'Body Font Properties', 'redux-framework-demo' ),
                        'google'   => true,
                        'subsets'  => true,
                        'default'  => array(
                            'color'       => '#444',
                            'font-size'   => '14px',
                            'line-height'   => '26px',
                            'font-family' => 'PT Serif',
                            'font-weight' => 'Normal',
                        ),
                        'required' => array('body-font-type', 'equals', 'custom-body-google'),
                    ),
                    array(
                        'id' => 'custom-body-name',
                        'required'    => array('body-font-type', 'equals', 'custom-body'),
                        'type' => 'text',
                        'title' => __('Body Font Name', 'redux-framework-demo'),
                        'subtitle' => __('Body Font Name', 'redux-framework-demo'),
                        'default' => "Bebas Neue",
                    ),
                    array(
                        'id' => 'body-eot',
                        'required'    => array('body-font-type', 'equals', 'custom-body'),
                        'type' => 'text',
                        'title' => __('Custom Body Font (eot)', 'redux-framework-demo'),
                        'desc' => __('Custom Body Font (eot) URL', 'redux-framework-demo'),
                        'subtitle' => __('Custom Body Font (eot) URL', 'redux-framework-demo'),
                        'default' => THEMEROOT."/fonts/BebasNeueBook.eot",
                    ),                     
                    array(
                        'id' => 'body-iefix',
                        'required'    => array('body-font-type', 'equals', 'custom-body'),
                        'type' => 'text',
                        'title' => __('Custom Body Font (eot?#iefix)', 'redux-framework-demo'),
                        'desc' => __('Custom Body Font (eot?#iefix) URL', 'redux-framework-demo'),
                        'subtitle' => __('Custom Body Font (eot?#iefix) URL', 'redux-framework-demo'),
                        'default' => THEMEROOT."/fonts/BebasNeueBook.eot?#iefix",
                    ),    
                    array(
                        'id' => 'body-woff',
                        'required'    => array('body-font-type', 'equals', 'custom-body'),
                        'type' => 'text',
                        'title' => __('Custom Body Font (woff)', 'redux-framework-demo'),
                        'desc' => __('Custom Body Font (woff) URL', 'redux-framework-demo'),
                        'subtitle' => __('Custom Body Font (woff) URL', 'redux-framework-demo'),
                        'default' => THEMEROOT."/fonts/BebasNeueBook.woff",
                    ),                      
                    array(
                        'id' => 'body-ttf',
                        'required'    => array('body-font-type', 'equals', 'custom-body'),
                        'type' => 'text',
                        'title' => __('Custom Body Font (ttf)', 'redux-framework-demo'),
                        'desc' => __('Custom Body Font (ttf) URL', 'redux-framework-demo'),
                        'subtitle' => __('Custom Body Font (ttf) URL', 'redux-framework-demo'),
                        'default' => THEMEROOT."/fonts/BebasNeueBook.ttf",
                    ),                       
                    array(
                        'id' => 'body-svg',
                        'required'    => array('body-font-type', 'equals', 'custom-body'),
                        'type' => 'text',
                        'title' => __('Custom Body Font (svg)', 'redux-framework-demo'),
                        'desc' => __('Custom Body Font (svg) URL', 'redux-framework-demo'),
                        'subtitle' => __('Custom Body Font (svg) URL', 'redux-framework-demo'),
                        'default' => THEMEROOT."/fonts/BebasNeueBook.svg#BebasNeueBook",
                    ), 
/* Body */
/* Second Font */
                    array(
                        'id' => 'second-font-type',
                        'type' => 'select',  
                        'title' => __('Second Typography Type', 'redux-framework-demo'),
                        'subtitle' => __('Second Typography Font', 'redux-framework-demo'),
                        'options' => array( 'custom-second' => 'Custom Font', 'custom-second-google' => 'Google Fonts'),
                        'default' => 'custom-second-google',
                    ),
                    array(
                        'id'          => 'second-font',
                        'type'        => 'typography',
                        'title'       => __( 'Second Font (Heading Font)', 'redux-framework-demo' ),
                        'font-backup' => false,
                        'font-size' => false,
                        'output'      => array( 'h1,h2,h3,h4,h5,h6,.blog-tagline,.instagram-bar-subtitle, #top-menu ul li a, .tooltip-inner,#footer-menu ul li a, .slicknav_btn .slicknav_menutxt, .mOver-list li a, .mOver-mobile .mOver-mobile-title, .post-element,#calendar_wrap thead,#calendar_wrap caption, tfoot,.sidebar-widget .searchform input[type="text"],input[type="text"],.scrollup, .tab-content h4 a' ),
                        'font-weight' => false,
                        'font-style' => false,
                        'text-align' => false,
                        'subsets'  => true,
                        'line-height'   => false,
                        'color'   => false,
                        'letter-spacing'=> false,  // Defaults to false
                        'all_styles'  => true,
                        'subtitle'    => __( 'Typography option with each property can be called individually.', 'redux-framework-demo' ),
                        'default'     => array(
                            'font-family' => 'Cabin',
                            'google'      => true,
                        ),
                        'required' => array('second-font-type', 'equals', 'custom-second-google'),
                    ),
                    array(
                        'id' => 'custom-second-name',
                        'required'    => array('second-font-type', 'equals', 'custom-second'),
                        'type' => 'text',
                        'title' => __('Second Font Name', 'redux-framework-demo'),
                        'subtitle' => __('Second Font Name', 'redux-framework-demo'),
                        'default' => "Bebas Neue",
                    ),
                    array(
                        'id' => 'second-eot',
                        'required'    => array('second-font-type', 'equals', 'custom-second'),
                        'type' => 'text',
                        'title' => __('Custom Second Font (eot)', 'redux-framework-demo'),
                        'desc' => __('Custom Second Font (eot) URL', 'redux-framework-demo'),
                        'subtitle' => __('Custom Second Font (eot) URL', 'redux-framework-demo'),
                        'default' => THEMEROOT."/fonts/BebasNeueBook.eot",
                    ),                     
                    array(
                        'id' => 'second-iefix',
                        'required'    => array('second-font-type', 'equals', 'custom-second'),
                        'type' => 'text',
                        'title' => __('Custom Second Font (eot?#iefix)', 'redux-framework-demo'),
                        'desc' => __('Custom Second Font (eot?#iefix) URL', 'redux-framework-demo'),
                        'subtitle' => __('Custom Second Font (eot?#iefix) URL', 'redux-framework-demo'),
                        'default' => THEMEROOT."/fonts/BebasNeueBook.eot?#iefix",
                    ),    
                    array(
                        'id' => 'second-woff',
                        'required'    => array('second-font-type', 'equals', 'custom-second'),
                        'type' => 'text',
                        'title' => __('Custom Second Font (woff)', 'redux-framework-demo'),
                        'desc' => __('Custom Second Font (woff) URL', 'redux-framework-demo'),
                        'subtitle' => __('Custom Second Font (woff) URL', 'redux-framework-demo'),
                        'default' => THEMEROOT."/fonts/BebasNeueBook.woff",
                    ),                      
                    array(
                        'id' => 'second-ttf',
                        'required'    => array('second-font-type', 'equals', 'custom-second'),
                        'type' => 'text',
                        'title' => __('Custom Second Font (ttf)', 'redux-framework-demo'),
                        'desc' => __('Custom Second Font (ttf) URL', 'redux-framework-demo'),
                        'subtitle' => __('Custom Second Font (ttf) URL', 'redux-framework-demo'),
                        'default' => THEMEROOT."/fonts/BebasNeueBook.ttf",
                    ),                       
                    array(
                        'id' => 'second-svg',
                        'required'    => array('second-font-type', 'equals', 'custom-second'),
                        'type' => 'text',
                        'title' => __('Custom Second Font (svg)', 'redux-framework-demo'),
                        'desc' => __('Custom Second Font (svg) URL', 'redux-framework-demo'),
                        'subtitle' => __('Custom Second Font (svg) URL', 'redux-framework-demo'),
                        'default' => THEMEROOT."/fonts/BebasNeueBook.svg#BebasNeueBook",
                    ), 
/* Second Font */
/* Main Font */
                    array(
                        'id' => 'main-font-type',
                        'type' => 'select',
                        'title' => __('Main Typography Type', 'redux-framework-demo'),
                        'subtitle' => __('Main Typography Font', 'redux-framework-demo'),
                        'options' => array( 'custom-main' => 'Custom Font', 'custom-main-google' => 'Google Fonts'),
                        'default' => 'custom-main-google',
                    ),
                    array(
                        'id'          => 'main-menu-font',
                        'type'        => 'typography',
                        'title'       => __( 'Main Menu Typography', 'redux-framework-demo' ),
                        'font-backup' => false,
                        'text-align' => false,
                        'line-height'   => false,
                        'letter-spacing'=> true,  // Defaults to false
                        'all_styles'  => true,
                        'subsets'  => true,
                        'output'      => array( 'nav#main-menu ul li a, .reading-text, #mega-menu-wrap-main-menu #mega-menu-main-menu a' ),
                        'subtitle'    => __( 'Typography option with each property can be called individually.', 'redux-framework-demo' ),
                        'default'     => array(
                            'color'       => '#222',
                            'font-weight'  => '400',
                            'font-family' => 'Cabin',
                            'google'      => true,
                            'font-size'   => '11px',
                            'letter-spacing' => '1.5'
                        ),
                        'required' => array('main-font-type', 'equals', 'custom-main-google'),
                    ),
                    array(
                        'id' => 'custom-main-name',
                        'required'    => array('main-font-type', 'equals', 'custom-main'),
                        'type' => 'text',
                        'title' => __('Main Font Name', 'redux-framework-demo'),
                        'subtitle' => __('Main Font Name', 'redux-framework-demo'),
                        'default' => "Bebas Neue",
                    ),
                    array(
                        'id' => 'main-eot',
                        'required'    => array('main-font-type', 'equals', 'custom-main'),
                        'type' => 'text',
                        'title' => __('Custom Main Font (eot)', 'redux-framework-demo'),
                        'desc' => __('Custom Main Font (eot) URL', 'redux-framework-demo'),
                        'subtitle' => __('Custom Main Font (eot) URL', 'redux-framework-demo'),
                        'default' => THEMEROOT."/fonts/BebasNeueBook.eot",
                    ),                     
                    array(
                        'id' => 'main-iefix',
                        'required'    => array('main-font-type', 'equals', 'custom-main'),
                        'type' => 'text',
                        'title' => __('Custom Main Font (eot?#iefix)', 'redux-framework-demo'),
                        'desc' => __('Custom Main Font (eot?#iefix) URL', 'redux-framework-demo'),
                        'subtitle' => __('Custom Main Font (eot?#iefix) URL', 'redux-framework-demo'),
                        'default' => THEMEROOT."/fonts/BebasNeueBook.eot?#iefix",
                    ),    
                    array(
                        'id' => 'main-woff',
                        'required'    => array('main-font-type', 'equals', 'custom-main'),
                        'type' => 'text',
                        'title' => __('Custom Main Font (woff)', 'redux-framework-demo'),
                        'desc' => __('Custom Main Font (woff) URL', 'redux-framework-demo'),
                        'subtitle' => __('Custom Main Font (woff) URL', 'redux-framework-demo'),
                        'default' => THEMEROOT."/fonts/BebasNeueBook.woff",
                    ),                      
                    array(
                        'id' => 'main-ttf',
                        'required'    => array('main-font-type', 'equals', 'custom-main'),
                        'type' => 'text',
                        'title' => __('Custom Main Font (ttf)', 'redux-framework-demo'),
                        'desc' => __('Custom Main Font (ttf) URL', 'redux-framework-demo'),
                        'subtitle' => __('Custom Main Font (ttf) URL', 'redux-framework-demo'),
                        'default' => THEMEROOT."/fonts/BebasNeueBook.ttf",
                    ),                       
                    array(
                        'id' => 'main-svg',
                        'required'    => array('main-font-type', 'equals', 'custom-main'),
                        'type' => 'text',
                        'title' => __('Custom Main Font (svg)', 'redux-framework-demo'),
                        'desc' => __('Custom Main Font (svg) URL', 'redux-framework-demo'),
                        'subtitle' => __('Custom Main Font (svg) URL', 'redux-framework-demo'),
                        'default' => THEMEROOT."/fonts/BebasNeueBook.svg#BebasNeueBook",
                    ), 
                )
            ));





        Redux::setSection( $opt_name, array(
            'title'  => __( 'Custom Css', 'redux-framework-demo' ),
            'id'     => 'custom-css',
            'icon'   => 'el-icon-css',
                'fields' => array(
                    array(
                        'id' => 'custom-css-area',
                        'type' => 'textarea',
                        'title' => __('Custom CSS', 'redux-framework-demo'),
                        'subtitle' => __('Quickly add some CSS to your theme by adding it to this block.', 'redux-framework-demo'),
                        'desc' => __('', 'redux-framework-demo'),
                        'validate' => 'css',
                    ),                                                                                                                      
                )
            ));
            
  

    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'redux-framework-demo' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content'  => file_get_contents( dirname( __FILE__ ) . '/../README.md' )
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    function compiler_action( $options, $css, $changed_values ) {
        echo '<h1>The compiler hook has run!</h1>';
        echo "<pre>";
        print_r( $changed_values ); // Values that have changed since the last save
        echo "</pre>";
        //print_r($options); //Option values
        //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    function dynamic_section( $sections ) {
        //$sections = array();
        $sections[] = array(
            'title'  => __( 'Section via hook', 'redux-framework-demo' ),
            'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo' ),
            'icon'   => 'el el-paper-clip',
            // Leave this as a blank section, no options just some intro text set above.
            'fields' => array()
        );

        return $sections;
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    function change_arguments( $args ) {
        //$args['dev_mode'] = true;

        return $args;
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    function change_defaults( $defaults ) {
        $defaults['str_replace'] = 'Testing filter hook!';

        return $defaults;
    }

    // Remove the demo link and the notice of integrated demo from the redux-framework plugin
    function remove_demo() {

        // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
        if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
            remove_filter( 'plugin_row_meta', array(
                ReduxFrameworkPlugin::instance(),
                'plugin_metalinks'
            ), null, 2 );

            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
            remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
        }
    }






    $tracking = get_option( 'redux-framework-tracking' );
if ( $tracking && ( ! is_array( $tracking ) || empty( $tracking['allow-tracking'] ) ) ) {
    $tracking                   = array();
    $tracking['dev_mode']       = false;
    $tracking['allow_tracking'] = 'no';
    $tracking['tour']           = 0;
    update_option( 'redux-framework-tracking', $tracking );
}
