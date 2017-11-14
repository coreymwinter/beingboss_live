<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign

	
add_filter( 'rwmb_meta_boxes', 'artmag_fm_register_meta_boxes' );

function artmag_fm_register_meta_boxes( $meta_boxes )
{


$prefix = 'artmag_fm_';
global $artmag_opt;
global $meta_boxes;

$sidebars = $GLOBALS['wp_registered_sidebars'];
foreach ( $sidebars as $sidebar ) { 
   $sidebar_options[$sidebar['id']] = $sidebar['name'];
}

$meta_boxes = array();

/*-----------------------------------------------------------------------------------*/
/*  Sidebar Position For Post and Page
/*-----------------------------------------------------------------------------------*/
if(!empty($artmag_opt['sidebar-type'])){
	if($artmag_opt['sidebar-type'] != "none"){
		if(empty($artmag_opt['blog_sidebar'])) { $artmag_opt['blog_sidebar'] = "main-sidebar"; }
		$blog_post_sidebar = esc_attr($artmag_opt['blog_sidebar']);
		$meta_boxes[] = array(
			'id' => 'sidebar',
			'title' => __( 'Sidebar', 'artmag_bg_fm' ),
			'pages' => array( 'post' ),
			'context' => 'side',
			'priority' => 'high',
			'fields' => array(
				array(
					'name'     => __( 'Select Sidebar(Default sidebar selected. You can change it from theme options.)', 'artmag_bg_fm' ),
					'id'       => "{$prefix}selectpostsidebar",
					'type'     => 'select',
					// Array of 'value' => 'Label' pairs for select box
					'options'  => $sidebar_options,
					// Select multiple values, optional. Default is false.
					'multiple'    => false,
					'std'         => $blog_post_sidebar,
					'placeholder' => __( 'Select Sidebar', 'artmag_bg_fm' ),
				),
		));
	}
}


/*-----------------------------------------------------------------------------------*/
/*  Page
/*-----------------------------------------------------------------------------------*/


$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'editor-pick',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( 'Slider', 'meta-box' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array('Page Options'),


	// List of meta fields
	'fields' => array(
		array(
			'name'     => __( '<p>Show Title</p>', 'meta-box' ),
			'desc'		=> __('Show Title?',"artmag_bg_fm"),
			'id'       => $prefix."page_title",
			'type'     => 'checkbox',
			'std'         => "1",
		),								
	),






);

/*-----------------------------------------------------------------------------------*/
/*  Must Read Filter
/*-----------------------------------------------------------------------------------*/


$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'must-read',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( 'Featured Post', 'meta-box' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array('post'),
	'context' => 'side',
	'priority' => 'high',


	// List of meta fields
	'fields' => array(
		array(
			'name'     => __( '<p>Add this post in Featured posts!</p>', 'meta-box' ),
			'id'       => $prefix."must_read",
			'type'     => 'select',
			'options'  => array(
				'Yes' => __( 'Yes, Please!', 'meta-box' ),
				'No' => __( 'No', 'meta-box' ),
			),
			'multiple'    => false,
			'std'         => "No",
		),								
	),
);
$blog_featured_image = "";
if(!empty($artmag_opt['blog_featured_image'])){
	$blog_featured_image = esc_attr($artmag_opt['blog_featured_image']);
}
$meta_boxes[] = array(
	'id' => 'postfeatured',
	'title' => __( 'Featured Image Style', 'artmag_bg_fm' ),
	'pages' => array( 'post' ),
	'context' => 'side',
	'priority' => 'high',
	'fields' => array(
		array(
			'name'     => __( 'Select Featured Image Style(Default style selected. You can change it from theme options.)', 'artmag_bg_fm' ),
			'id'       => "{$prefix}blogfeaturedimage",
			'type'     => 'select',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'full' => __( 'Full Image', 'meta-box' ),
				'half' => __( 'Half Image', 'meta-box' ),
				'fullwidth' => __( 'Full Screen Width Image', 'meta-box' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => $blog_featured_image,
			'placeholder' => __( 'Select Featured Image Type', 'artmag_bg_fm' ),
		),
));


/*-----------------------------------------------------------------------------------*/
/*  Gallery Post Format
/*-----------------------------------------------------------------------------------*/

$meta_boxes[] = array(
	'id'		=> 'artmag_bg_fm-blogmeta-gallery',
	'title'		=> __('Blog Post Image Slides',"artmag_bg_fm"),
	'pages'		=> array( 'post', ),
	'context' => 'normal',

	'fields'	=> array(
		array(
			'name'	=> __('Portfolio Gallery','artmag'),
			'desc'	=> __('Max Photo Limit is <b>25</b>','artmag'),
			'id'	=> $prefix . 'galleryslides',
			'type'	=> 'image_advanced',
			'max_file_uploads' => 25,
		)
		
	)
);


/*-----------------------------------------------------------------------------------*/
/*  Audio Post Format
/*-----------------------------------------------------------------------------------*/

$meta_boxes[] = array(
	'id' => 'artmag_bg_fm-blogmeta-audio',
	'title' => __('Audio Settings',"artmag_bg_fm"),
	'pages' => array( 'post'),
	'context' => 'normal',


	'fields' => array(	
		array(
			'name'		=> __('Audio Code',"artmag_bg_fm"),
			'id'		=> $prefix . 'audio',
			'desc'		=> __('Enter your Audio URL(Oembed) or Embed Code.',"artmag_bg_fm"),
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> ''
		),
		
	)
);


/*-----------------------------------------------------------------------------------*/
/*  Link Post Format
/*-----------------------------------------------------------------------------------*/

$meta_boxes[] = array(
	'id' => 'artmag_bg_fm-blogmeta-link',
	'title' => __('Link Settings',"artmag_bg_fm"),
	'pages' => array( 'post'),
	'context' => 'normal',


	'fields' => array(	
		array(
			'name'		=> __('Link Post Type',"artmag_bg_fm"),
			'id'		=> $prefix . 'link',
			'desc'		=> __('Please Write Url (Example : http://google.com)',"artmag_bg_fm"),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		
	)
);


/*-----------------------------------------------------------------------------------*/
/*  Quote Post Format
/*-----------------------------------------------------------------------------------*/

$meta_boxes[] = array(
	'id' => 'artmag_bg_fm-blogmeta-quote',
	'title' => __('Quote Settings',"artmag_bg_fm"),
	'pages' => array( 'post'),
	'context' => 'normal',


	'fields' => array(	
		array(
			'name'		=> __('Quote Text',"artmag_bg_fm"),
			'id'		=> $prefix . 'quote',
			'desc'		=> __('Enter your Quote Text',"artmag_bg_fm"),
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> ''
		),
		
	)
);


/*-----------------------------------------------------------------------------------*/
/*  Video Post Format
/*-----------------------------------------------------------------------------------*/

$meta_boxes[] = array(
	'id'		=> 'artmag_bg_fm-blogmeta-video',
	'title'		=> __('Blog Video Settings',"artmag_bg_fm"),
	'pages'		=> array( 'post' ),
	'context' => 'normal',

	'fields'	=> array(
		array(
			'name'	=> __('Embed Code',"artmag_bg_fm"),
			'id'	=> $prefix . 'video_embed',
			'desc'	=> __('Insert paste embed code',"artmag_bg_fm"),
			'type' 	=> 'textarea',
			'std' 	=> "",
			'cols' 	=> "38",
			'rows' 	=> "10"
		)
	)
);



	return $meta_boxes;
}