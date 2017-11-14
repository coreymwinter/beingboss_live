<?php global $artmag_opt;

vc_disable_frontend();

function vc_remove_frontend_links() {
    vc_disable_frontend(); // this will disable frontend editor
}
add_action( 'vc_after_init', 'vc_remove_frontend_links' );

/*-----------------------------------------------------------------------------------*/
/*   Remove Elements
/*-----------------------------------------------------------------------------------*/

	//vc_remove_element('vc_facebook');

/*-----------------------------------------------------------------------------------*/
/*   Remove Param
/*-----------------------------------------------------------------------------------*/

if (function_exists('vc_remove_param')) {
  	//vc_remove_param('vc_row', 'parallax');
}

if (is_rtl()){
	$post_align = "Right";
}else{
	$post_align = "Left";
}

$getcategories = get_categories();
foreach ( $getcategories as $listcategories ) {
	$listedcategories[$listcategories->name] = $listcategories->slug;
}


/*-----------------------------------------------------------------------------------*/
/*   Newsletter
/*-----------------------------------------------------------------------------------*/

vc_map( array(
	"name" => __( "Newsletter [Mailchimp]", "artmag-admin" ),
	"base" => "t_newsletter",
	"category" => __( "2035 Shortcode", "artmag-admin"),
	"description" => __( "by 2035Themes", "artmag-admin"),
	"params" => array(
	
	array(
        "type" => "textfield",
        "holder" => "div",
        "heading" => __( "Subtitle", "artmag-admin" ),
        "param_name" => "newsletter_subtitle",
        "value" => __( "SUBSCRIBE OUR NEWSLETTER", "artmag-admin" ),
    ),
	
	array(
        "type" => "textfield",
        "holder" => "div",
        "heading" => __( "Input Placeholder", "artmag-admin" ),
        "param_name" => "newsletter_placeholder",
        "value" => __( "ENTER YOUR MAIL ADDRESS HERE", "artmag-admin" ),
    ),

	array(
        "type" => "textfield",
        "holder" => "div",
        "heading" => __( "Submit Text", "artmag-admin" ),
        "param_name" => "newsletter_submit_text",
        "value" => __( "Submit", "artmag-admin" ),
    ),

	array(
        "type" => "textfield",
        "holder" => "div",
        "heading" => __( "Mailchimp Source Url", "artmag-admin" ),
        "param_name" => "newsletter_source_url",
        "value" => __( "//2035themes.us10.list-manage.com/subscribe/post?u=4745a61fa64bbaaa93263f2b8&amp;id=951c4ebba6", "artmag-admin" ),
    ),



    ),
));






/*-----------------------------------------------------------------------------------*/
/*   Image Background Post
/*-----------------------------------------------------------------------------------*/

vc_map( array(
	"name" => __( "Image Background Post", "artmag-admin" ),
	"base" => "t_image",
	"category" => __( "2035 Shortcode", "artmag-admin"),
	"description" => __( "by 2035Themes", "artmag-admin"),
	"params" => array(


    array(
		"type" => "dropdown",
		"heading" => __( "Column?", "artmag-admin" ),
	    "param_name" => "image_p_column",
		"value" => array(
			"1 Column"  	=>  "1",
			"2 Columns"  	=>  "2",
			"3 Columns"  	=>  "3",
			"4 Columns"  	=>  "4",
		),
		"std" => "1",
		'group' => __( 'General', 'artmag-admin' )
    ),		

    array(
		"type" => "dropdown",
		"heading" => __( "News Title?", "artmag-admin" ),
	    "param_name" => "image_p_show_title",
		"value" => array(
			"Yes"  	=>  "yes",
			"No"  	=>  "no",
		),
		"std" => "no",
		'group' => __( 'Title', 'artmag-admin' )
    ),
  	array(
        "type" => "textfield",
        "holder" => "div",
        "heading" => __( "Latest Post Title", "artmag-admin" ),
        "param_name" => "image_p_title",
        "dependency" => Array('element' => "image_p_show_title", 'value' => array('yes')),
        'group' => __( 'Title', 'artmag-admin' )
    ),
    array(
		"type" => "dropdown",
		"heading" => __( "Title Seperator Style", "artmag-admin" ),
	    "param_name" => "image_p_title_seperator",
		"value" => array(
			"Center Title | Two Line"  	=> "two-line",
			"Center Title | Bottom Line"  	=> "center-bottom-line",
			"Left Title | Vertical Middle Line"  => "middle-line",
			"Left Title | Top Line"  => "top-line",
			"Left Title | Bottom Line"  => "bottom-line",
		),
		"std" => "top-line",
		"dependency" => Array('element' => "image_p_show_title", 'value' => array('yes')),
		'group' => __( 'Title', 'artmag-admin' )
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "All News Link?", "artmag-admin" ),
	    "param_name" => "image_p_news_link",
		"value" => array(
			"Yes"  	=>  "yes",
			"No"  	=>  "no",
		),
		"std" => "yes",
		"dependency" => Array('element' => "image_p_show_title", 'value' => array('yes')),
		'group' => __( 'Title', 'artmag-admin' )
    ),


    array(
		"type" => "dropdown",
		"heading" => __( "Link Position", "artmag-admin" ),
	    "param_name" => "image_p_news_link_position",
		"value" => array(
			"Right"  	=>  "right",
			"Bottom"  	=>  "bottom",
		),
		"std" => "right",
		"dependency" => Array('element' => "image_p_news_link", 'value' => array('yes')),
		'group' => __( 'Title', 'artmag-admin' )
    ),


  	array(
        "type" => "textfield",
        "holder" => "div",
        "heading" => __( "All News Link URL", "artmag-admin" ),
        "param_name" => "image_p_news_link_url",
        "dependency" => Array('element' => "image_p_news_link", 'value' => array('yes')),
        'group' => __( 'Title', 'artmag-admin' )
    ),

  	array(
        "type" => "textfield",
        "holder" => "div",
        "heading" => __( "All News Link Text", "artmag-admin" ),
        "param_name" => "image_p_news_link_text",
        "dependency" => Array('element' => "image_p_news_link", 'value' => array('yes')),
        'group' => __( 'Title', 'artmag-admin' )
    ),

    array(
		"type" => "checkbox",
		"heading" => __( "Category", "artmag-admin" ),
	    "param_name" => "image_p_cat_list",
		"value" => $listedcategories,
		"std" => "typo",
		'group' => __( 'Filter', 'artmag-admin' )
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "Post Format", "artmag-admin" ),
	    "param_name" => "image_p_post_format",
		"value" => array(
			"All"  => "all",
			"Audio"  => "audio",
			"Gallery"  => "gallery",
			"Link"  => "link",
			"Quote"  => "quote",
			"Video"  => "video",
		),
		"std" => "",
		'group' => __( 'Filter', 'artmag-admin' )
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "Featured Posts Filter", "artmag-admin" ),
	    "param_name" => "image_p_must_read",
		"value" => array(
			"No"  => "no",
			"Yes, Please!"  => "yes",
		),
		"std" => "no",
		'group' => __( 'Filter', 'artmag-admin' )
    ),



	array(
        "type" => "textfield",
        "holder" => "div",
        "heading" => __( "Badge Text", "artmag-admin" ),
        "param_name" => "image_p_badge_text",
        'group' => __( 'Visibility', 'artmag-admin' )
    ),	



    array(
		"type" => "dropdown",
		"heading" => __( "Show Post Content?", "artmag-admin" ),
	    "param_name" => "image_p_show_content",
		"value" => array(
			"Show"  	=>  "show",
			"Hide"  	=>  "hide",
		),
		"std" => "hide",
		'group' => __( 'Visibility', 'artmag-admin' )
    ),
	array(
        "type" => "textfield",
        "holder" => "div",
        "heading" => __( "Excerpt Value", "artmag-admin" ),
        "param_name" => "image_p_excerpt_value",
        "value" => __( "28", "artmag-admin" ),
        "dependency" => Array('element' => "image_p_show_content", 'value' => array('show')),
        'group' => __( 'Visibility', 'artmag-admin' )
    ),	



    array(
		"type" => "dropdown",
		"heading" => __( "Author Name Visibiliy?", "artmag-admin" ),
	    "param_name" => "image_p_author_v",
		"value" => array(
			"Hide"  	=>  "hide",
			"Show"  	=>  "show",
		),
		"std" => "show",
		'group' => __( 'Visibility', 'artmag-admin' )
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "Date Visibiliy?", "artmag-admin" ),
	    "param_name" => "image_p_date_v",
		"value" => array(
			"Hide"  	=>  "hide",
			"Show"  	=>  "show",
		),
		"std" => "show",
		'group' => __( 'Visibility', 'artmag-admin' )
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "Sorting", "artmag-admin" ),
	    "param_name" => "image_p_sorting",
		"value" => array(
			"Descending"  	=>  "DESC",
			"Ascending"  	=>  "ASC",
		),
		"std" => "DESC",
		'group' => __( 'Data Settings', 'artmag-admin' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
    ),
    array(
		"type" => "dropdown",
		"heading" => __( "Show Share?", "artmag-admin" ),
	    "param_name" => "image_p_show_share",
		"value" => array(
			"Hide"  	=>  "hide",
			"Show"  	=>  "show",
		),
		"std" => "show",
		'group' => __( 'Visibility', 'artmag-admin' )
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "Post View Visibiliy?", "artmag-admin" ),
	    "param_name" => "image_p_show_postview",
		"value" => array(
			"Hide"  	=>  "hide",
			"Show"  	=>  "show",
		),
		"std" => "show",
		'group' => __( 'Visibility', 'artmag-admin' )
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "Category Visibility?", "artmag-admin" ),
	    "param_name" => "image_p_show_cat",
		"value" => array(
			"Show"  	=>  "show",
			"Hide"  	=>  "hide",
		),
		"std" => "show",
		'group' => __( 'Visibility', 'artmag-admin' )
    ),
    array(
		"type" => "dropdown",
		"heading" => __( "Post Format Visibility?", "artmag-admin" ),
	    "param_name" => "image_p_post_format",
		"value" => array(
			"Show"  	=>  "show",
			"Hide"  	=>  "hide",
		),
		"std" => "hide",
		'group' => __( 'Visibility', 'artmag-admin' )
    ),


    array(
		"type" => "dropdown",
		"heading" => __( "Order by", "artmag-admin" ),
	    "param_name" => "image_p_order_by",
		"value" => array(
			"Date"  	=> "date",
			"Most Viewed"  => "meta_value_num",
			"Order by post ID"  => "ID",
			"Author"  => "author",
			"Title"  => "title",
			"Last modified date"  => "modified",
			"Post/page parent ID"  => "parent",
			"Number of comments"  => "comment_count",
			"Menu order/Page Order"  => "menu_order",
			"Meta value"  => "meta_value",
			"Random order"  => "rand",
		),
		"std" => "date",
		'group' => __( 'Data Settings', 'artmag-admin' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
    ),


	array(
        "type" => "textfield",
        "holder" => "div",
        "heading" => __( "Post Limit", "artmag-admin" ),
        "param_name" => "image_p_post_count",
        "value" => __( "1", "artmag-admin" ),
        "description" => __( "Enter -1 to display all", "artmag-admin" ),
        'group' => __( 'General', 'artmag-admin' )
    ),	

    ),
));








/*-----------------------------------------------------------------------------------*/
/*   Feature Post + Right Thumbnails
/*-----------------------------------------------------------------------------------*/


vc_map( array(
	"name" => __( "Feature Post + Right Thumbnails", "artmag-admin" ),
	"base" => "t_one_big_right",
	"category" => __( "2035 Shortcode", "artmag-admin"),
	"description" => __( "by 2035Themes", "artmag-admin"),
	"params" => array(

    array(
		"type" => "textfield",
		"heading" => __( "Thumbnail Post Limit?", "artmag-admin" ),
	    "param_name" => "one_br_thumb_post_limit",
		"std" => 4,
    ),


    array(
		"type" => "dropdown",
		"heading" => __( "Pattern Seperator", "artmag-admin" ),
	    "param_name" => "one_br_pattern_seperator",
		"value" => array(
			"Show"  => "show",
			"Hide"  => "hide",
		),
		"std" => "hide",
    ),


    array(
		"type" => "dropdown",
		"heading" => __( "News Title?", "artmag-admin" ),
	    "param_name" => "one_br_show_title",
		"value" => array(
			"Yes"  	=>  "yes",
			"No"  	=>  "no",
		),
		"std" => "yes",
		'group' => __( 'Title', 'artmag-admin' )
    ),

  	array(
        "type" => "textfield",
        "holder" => "div",
        "heading" => __( "Custom Title", "artmag-admin" ),
        "param_name" => "one_br_title",
        "dependency" => Array('element' => "one_br_show_title", 'value' => array('yes')),
        'group' => __( 'Title', 'artmag-admin' )
    ),
    array(
		"type" => "dropdown",
		"heading" => __( "Title Seperator Style", "artmag-admin" ),
	    "param_name" => "one_br_title_seperator",
		"value" => array(
			"Center Title | Two Line"  	=> "two-line",
			"Center Title | Bottom Line"  	=> "center-bottom-line",
			"Left Title | Vertical Middle Line"  => "middle-line",
			"Left Title | Top Line"  => "top-line",
			"Left Title | Bottom Line"  => "bottom-line",
		),
		"std" => "top-line",
		"dependency" => Array('element' => "one_br_show_title", 'value' => array('yes')),
		'group' => __( 'Title', 'artmag-admin' )
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "All News Link?", "artmag-admin" ),
	    "param_name" => "one_br_news_link",
		"value" => array(
			"Yes"  	=>  "yes",
			"No"  	=>  "no",
		),
		"std" => "yes",
		"dependency" => Array('element' => "one_br_show_title", 'value' => array('yes')),
		'group' => __( 'Title', 'artmag-admin' )
    ),


    array(
		"type" => "dropdown",
		"heading" => __( "Link Position", "artmag-admin" ),
	    "param_name" => "one_br_news_link_position",
		"value" => array(
			"Right"  	=>  "right",
			"Bottom"  	=>  "bottom",
		),
		"std" => "right",
		"dependency" => Array('element' => "one_br_news_link", 'value' => array('yes')),
		'group' => __( 'Title', 'artmag-admin' )
    ),


  	array(
        "type" => "textfield",
        "holder" => "div",
        "heading" => __( "All News Link URL", "artmag-admin" ),
        "param_name" => "one_br_news_link_url",
        "dependency" => Array('element' => "one_br_news_link", 'value' => array('yes')),
        'group' => __( 'Title', 'artmag-admin' )
    ),

  	array(
        "type" => "textfield",
        "holder" => "div",
        "heading" => __( "All News Link Text", "artmag-admin" ),
        "param_name" => "one_br_news_link_text",
        "dependency" => Array('element' => "one_br_news_link", 'value' => array('yes')),
        'group' => __( 'Title', 'artmag-admin' )
    ),

    array(
		"type" => "checkbox",
		"heading" => __( "Category", "artmag-admin" ),
	    "param_name" => "one_br_cat",
		"value" => $listedcategories,
		"std" => "typo",
		'group' => __( 'Filter', 'artmag-admin' )
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "Post Format", "artmag-admin" ),
	    "param_name" => "one_br_post_format",
		"value" => array(
			"All"  => "all",
			"Audio"  => "audio",
			"Gallery"  => "gallery",
			"Link"  => "link",
			"Quote"  => "quote",
			"Video"  => "video",
		),
		"std" => "",
		'group' => __( 'Filter', 'artmag-admin' )
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "Featured Posts Filter", "artmag-admin" ),
	    "param_name" => "one_br_must_read",
		"value" => array(
			"No"  => "no",
			"Yes, Please!"  => "yes",
		),
		"std" => "no",
		'group' => __( 'Filter', 'artmag-admin' )
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "Author Name Visibiliy?", "artmag-admin" ),
	    "param_name" => "one_br_author_v",
		"value" => array(
			"Hide"  	=>  "hide",
			"Show"  	=>  "show",
		),
		"std" => "show",
		'group' => __( 'Visibility', 'artmag-admin' )
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "Date Visibiliy?", "artmag-admin" ),
	    "param_name" => "one_br_date_v",
		"value" => array(
			"Hide"  	=>  "hide",
			"Show"  	=>  "show",
		),
		"std" => "show",
		'group' => __( 'Visibility', 'artmag-admin' )
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "Share Visibiliy?", "artmag-admin" ),
	    "param_name" => "one_br_share_v",
		"value" => array(
			"Hide"  	=>  "hide",
			"Show"  	=>  "show",
		),
		"std" => "hide",
		'group' => __( 'Visibility', 'artmag-admin' )
    ),
    array(
		"type" => "dropdown",
		"heading" => __( "Post View Visibiliy?", "artmag-admin" ),
	    "param_name" => "one_br_postview_v",
		"value" => array(
			"Hide"  	=>  "hide",
			"Show"  	=>  "show",
		),
		"std" => "hide",
		'group' => __( 'Visibility', 'artmag-admin' )
    ),
    array(
		"type" => "dropdown",
		"heading" => __( "Category Visibility?", "artmag-admin" ),
	    "param_name" => "one_br_cat_v",
		"value" => array(
			"Hide"  	=>  "hide",
			"Show"  	=>  "show",
		),
		"std" => "hide",
		'group' => __( 'Visibility', 'artmag-admin' )
    ),
    array(
		"type" => "dropdown",
		"heading" => __( "Show Post Content?", "artmag-admin" ),
	    "param_name" => "one_br_show_content",
		"value" => array(
			"Show"  	=>  "show",
			"Hide"  	=>  "hide",
		),
		"std" => "hide",
		'group' => __( 'Visibility', 'artmag-admin' )
    ),
	array(
        "type" => "textfield",
        "holder" => "div",
        "heading" => __( "Excerpt Value", "artmag-admin" ),
        "param_name" => "one_br_excerpt_value",
        "value" => __( "19", "artmag-admin" ),
        "dependency" => Array('element' => "one_br_show_content", 'value' => array('show')),
        'group' => __( 'Visibility', 'artmag-admin' )
    ),









    array(
		"type" => "dropdown",
		"heading" => __( "Order by", "artmag-admin" ),
	    "param_name" => "one_br_order_by",
		"value" => array(
			"Date"  	=> "date",
			"Most Viewed"  => "meta_value_num",
			"Order by post ID"  => "ID",
			"Author"  => "author",
			"Title"  => "title",
			"Last modified date"  => "modified",
			"Post/page parent ID"  => "parent",
			"Number of comments"  => "comment_count",
			"Menu order/Page Order"  => "menu_order",
			"Meta value"  => "meta_value",
			"Random order"  => "rand",
		),
		"std" => "date",
		'group' => __( 'Data Settings', 'artmag-admin' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
    ),
    array(
		"type" => "dropdown",
		"heading" => __( "Sorting", "artmag-admin" ),
	    "param_name" => "one_br_sorting",
		"value" => array(
			"Descending"  	=>  "DESC",
			"Ascending"  	=>  "ASC",
		),
		"std" => "DESC",
		'group' => __( 'Data Settings', 'artmag-admin' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
    ),

    ),
));




/*-----------------------------------------------------------------------------------*/
/*   Feature Post + Bottom Thumbnails
/*-----------------------------------------------------------------------------------*/


vc_map( array(
	"name" => __( "Feature Post + Bottom Thumbnails", "artmag-admin" ),
	"base" => "t_one_big_bottom",
	"category" => __( "2035 Shortcode", "artmag-admin"),
	"description" => __( "by 2035Themes", "artmag-admin"),
	"params" => array(

    array(
		"type" => "dropdown",
		"heading" => __( "Featured Post Visibility?", "artmag-admin" ),
	    "param_name" => "one_bb_featured_post",
		"value" => array(
			"Show"  => "show",
			"Hide"  => "hide",
		),
		"std" => "show",
    ),

    array(
		"type" => "textfield",
		"heading" => __( "Thumbnail Post Limit?", "artmag-admin" ),
	    "param_name" => "one_bb_thumb_post_limit",
		"std" => 3,
    ),


	
	
    array(
		"type" => "dropdown",
		"heading" => __( "News Title?", "artmag-admin" ),
	    "param_name" => "one_bb_show_title",
		"value" => array(
			"Yes"  	=>  "yes",
			"No"  	=>  "no",
		),
		"std" => "yes",
		'group' => __( 'Title', 'artmag-admin' )
    ),
  	array(
        "type" => "textfield",
        "holder" => "div",
        "heading" => __( "Custom Title", "artmag-admin" ),
        "param_name" => "one_bb_title",
        "dependency" => Array('element' => "one_bb_show_title", 'value' => array('yes')),
        'group' => __( 'Title', 'artmag-admin' )
    ),
    array(
		"type" => "dropdown",
		"heading" => __( "Title Seperator Style", "artmag-admin" ),
	    "param_name" => "one_bb_title_seperator",
		"value" => array(
			"Center Title | Two Line"  	=> "two-line",
			"Center Title | Bottom Line"  	=> "center-bottom-line",
			"Left Title | Vertical Middle Line"  => "middle-line",
			"Left Title | Top Line"  => "top-line",
			"Left Title | Bottom Line"  => "bottom-line",
		),
		"std" => "top-line",
		"dependency" => Array('element' => "one_bb_show_title", 'value' => array('yes')),
		'group' => __( 'Title', 'artmag-admin' )
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "All News Link?", "artmag-admin" ),
	    "param_name" => "one_bb_news_link",
		"value" => array(
			"Yes"  	=>  "yes",
			"No"  	=>  "no",
		),
		"std" => "yes",
		"dependency" => Array('element' => "one_bb_show_title", 'value' => array('yes')),
		'group' => __( 'Title', 'artmag-admin' )
    ),


    array(
		"type" => "dropdown",
		"heading" => __( "Link Position", "artmag-admin" ),
	    "param_name" => "one_bb_news_link_position",
		"value" => array(
			"Right"  	=>  "right",
			"Bottom"  	=>  "bottom",
		),
		"std" => "right",
		"dependency" => Array('element' => "one_bb_news_link", 'value' => array('yes')),
		'group' => __( 'Title', 'artmag-admin' )
    ),


  	array(
        "type" => "textfield",
        "holder" => "div",
        "heading" => __( "All News Link URL", "artmag-admin" ),
        "param_name" => "one_bb_news_link_url",
        "dependency" => Array('element' => "one_bb_news_link", 'value' => array('yes')),
        'group' => __( 'Title', 'artmag-admin' )
    ),

  	array(
        "type" => "textfield",
        "holder" => "div",
        "heading" => __( "All News Link Text", "artmag-admin" ),
        "param_name" => "one_bb_news_link_text",
        "dependency" => Array('element' => "one_bb_news_link", 'value' => array('yes')),
        'group' => __( 'Title', 'artmag-admin' )
    ),

    array(
		"type" => "checkbox",
		"heading" => __( "Category", "artmag-admin" ),
	    "param_name" => "one_bb_cat",
		"value" => $listedcategories,
		"std" => "typo",
		'group' => __( 'Filter', 'artmag-admin' )
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "Post Format", "artmag-admin" ),
	    "param_name" => "one_bb_post_format",
		"value" => array(
			"All"  => "all",
			"Audio"  => "audio",
			"Gallery"  => "gallery",
			"Link"  => "link",
			"Quote"  => "quote",
			"Video"  => "video",
		),
		"std" => "",
		'group' => __( 'Filter', 'artmag-admin' )
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "Featured Posts Filter", "artmag-admin" ),
	    "param_name" => "one_bb_must_read",
		"value" => array(
			"No"  => "no",
			"Yes, Please!"  => "yes",
		),
		"std" => "no",
		'group' => __( 'Filter', 'artmag-admin' )
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "Author Name Visibiliy?", "artmag-admin" ),
	    "param_name" => "one_bb_author_v",
		"value" => array(
			"Hide"  	=>  "hide",
			"Show"  	=>  "show",
		),
		"std" => "show",
		'group' => __( 'Visibility', 'artmag-admin' )
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "Date Visibiliy?", "artmag-admin" ),
	    "param_name" => "one_bb_date_v",
		"value" => array(
			"Hide"  	=>  "hide",
			"Show"  	=>  "show",
		),
		"std" => "hide",
		'group' => __( 'Visibility', 'artmag-admin' )
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "Share Visibiliy?", "artmag-admin" ),
	    "param_name" => "one_bb_share_v",
		"value" => array(
			"Hide"  	=>  "hide",
			"Show"  	=>  "show",
		),
		"std" => "hide",
		'group' => __( 'Visibility', 'artmag-admin' )
    ),
    array(
		"type" => "dropdown",
		"heading" => __( "Post View Visibiliy?", "artmag-admin" ),
	    "param_name" => "one_bb_postview_v",
		"value" => array(
			"Hide"  	=>  "hide",
			"Show"  	=>  "show",
		),
		"std" => "hide",
		'group' => __( 'Visibility', 'artmag-admin' )
    ),
    array(
		"type" => "dropdown",
		"heading" => __( "Category Visibility?", "artmag-admin" ),
	    "param_name" => "one_bb_cat_v",
		"value" => array(
			"Hide"  	=>  "hide",
			"Show"  	=>  "show",
		),
		"std" => "hide",
		'group' => __( 'Visibility', 'artmag-admin' )
    ),
	array(
        "type" => "textfield",
        "holder" => "div",
        "heading" => __( "Excerpt Value", "artmag-admin" ),
        "param_name" => "one_bb_excerpt_value",
        "value" => __( "19", "artmag-admin" ),
        'group' => __( 'Visibility', 'artmag-admin' )
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "Order by", "artmag-admin" ),
	    "param_name" => "one_bb_order_by",
		"value" => array(
			"Date"  	=> "date",
			"Most Viewed"  => "meta_value_num",
			"Order by post ID"  => "ID",
			"Author"  => "author",
			"Title"  => "title",
			"Last modified date"  => "modified",
			"Post/page parent ID"  => "parent",
			"Number of comments"  => "comment_count",
			"Menu order/Page Order"  => "menu_order",
			"Meta value"  => "meta_value",
			"Random order"  => "rand",
		),
		"std" => "date",
		'group' => __( 'Data Settings', 'artmag-admin' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
    ),
    array(
		"type" => "dropdown",
		"heading" => __( "Sorting", "artmag-admin" ),
	    "param_name" => "one_bb_sorting",
		"value" => array(
			"Descending"  	=>  "DESC",
			"Ascending"  	=>  "ASC",
		),
		"std" => "DESC",
		'group' => __( 'Data Settings', 'artmag-admin' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
    ),

    ),
));




/*-----------------------------------------------------------------------------------*/
/*   Slider
/*-----------------------------------------------------------------------------------*/


vc_map( array(
	"name" => __( "Slider", "artmag-admin" ),
	"base" => "t_slider",
	"category" => __( "2035 Shortcode", "artmag-admin"),
	"description" => __( "by 2035Themes", "artmag-admin"),
	"params" => array(

  	array(
        "type" => "textfield",
        "holder" => "div",
        "heading" => __( "Slider Title", "artmag-admin" ),
        "param_name" => "slider_title",
    ),
    array(
		"type" => "dropdown",
		"heading" => __( "Title Seperator Style", "artmag-admin" ),
	    "param_name" => "slider_title_seperator",
		"value" => array(
			""  	=> "",
			"Center Title | Two Line"  	=> "two-line",
			"Center Title | Bottom Line"  	=> "center-bottom-line",
			"Left Title | Vertical Middle Line"  => "middle-line",
			"Left Title | Top Line"  => "top-line",
			"Left Title | Bottom Line"  => "bottom-line",
		),
    ),
	array(
        "type" => "textfield",
        "holder" => "div",
        "heading" => __( "Slider Post Limit", "artmag-admin" ),
        "param_name" => "slider_post_limit",
        "value" => __( "4", "artmag-admin" ),
        "description" => __( "Enter -1 to display all", "artmag-admin" ),
    ),


    array(
		"type" => "dropdown",
		"heading" => __( "Slider Height", "artmag-admin" ),
	    "param_name" => "slider_height",
		"value" => array(
			"530px"  	=> "artmag-slider",
			"670px"  	=> "artmag-high-slider",
			"870px"  => "artmag-higher-slider",
		),
		"std" => "slider",
    ),

    array(
		"type" => "checkbox",
		"heading" => __( "Category", "artmag-admin" ),
	    "param_name" => "slider_cat_list",
		"value" => $listedcategories,
		"std" => "typo",
		'group' => __( 'Filter', 'artmag-admin' )
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "Post Format", "artmag-admin" ),
	    "param_name" => "slider_post_format",
		"value" => array(
			"All"  => "all",
			"Audio"  => "audio",
			"Gallery"  => "gallery",
			"Link"  => "link",
			"Quote"  => "quote",
			"Video"  => "video",
		),
		"std" => "",
		'group' => __( 'Filter', 'artmag-admin' )
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "Featured Posts Filter", "artmag-admin" ),
	    "param_name" => "slider_must_read",
		"value" => array(
			"No"  => "no",
			"Yes, Please!"  => "yes",
		),
		"std" => "no",
		'group' => __( 'Filter', 'artmag-admin' )
    ),

    ),
));


/*-----------------------------------------------------------------------------------*/
/*   Grid
/*-----------------------------------------------------------------------------------*/

vc_map( array(
	"name" => __( "Grid Posts", "artmag-admin" ),
	"base" => "t_grid_1",
	"category" => __( "2035 Shortcode", "artmag-admin"),
	"description" => __( "by 2035Themes", "artmag-admin"),
	"params" => array(

    array(
		"type" => "dropdown",
		"heading" => __( "Grid Column Size", "artmag-admin" ),
	    "param_name" => "cat_grid_column_size",
		"value" => array(
			"2 Column"  => "two-column",
			"3 Column"  => "three-column",
			"4 Column"  => "four-column",
			"5 Column"  => "five-column",
		),
		"std" => "three-column",
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "Post Align", "artmag-admin" ),
	    "param_name" => "cat_centered_post",
		"value" => array(
			$post_align	=>  "left",
			"Center" =>  "center",
		),
		"std" => "left",
    ),


    array(
		"type" => "dropdown",
		"heading" => __( "Pattern Seperator", "artmag-admin" ),
	    "param_name" => "cat_pattern_seperator",
		"value" => array(
			"Show"  => "show",
			"Hide"  => "hide",
		),
		"std" => "hide",
    ),


    array(
		"type" => "dropdown",
		"heading" => __( "News Title?", "artmag-admin" ),
	    "param_name" => "cat_show_title",
		"value" => array(
			"Yes"  	=>  "yes",
			"No"  	=>  "no",
		),
		"std" => "yes",
		'group' => __( 'Title', 'artmag-admin' )
    ),
  	array(
        "type" => "textfield",
        "holder" => "div",
        "heading" => __( "Custom Title", "artmag-admin" ),
        "param_name" => "cat_title",
        "dependency" => Array('element' => "cat_show_title", 'value' => array('yes')),
        'group' => __( 'Title', 'artmag-admin' )
    ),
    array(
		"type" => "dropdown",
		"heading" => __( "Title Seperator Style", "artmag-admin" ),
	    "param_name" => "cat_title_seperator",
		"value" => array(
			"Center Title | Two Line"  	=> "two-line",
			"Center Title | Bottom Line"  	=> "center-bottom-line",
			"Left Title | Vertical Middle Line"  => "middle-line",
			"Left Title | Top Line"  => "top-line",
			"Left Title | Bottom Line"  => "bottom-line",
		),
		"std" => "top-line",
		"dependency" => Array('element' => "cat_show_title", 'value' => array('yes')),
		'group' => __( 'Title', 'artmag-admin' )
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "All News Link?", "artmag-admin" ),
	    "param_name" => "cat_news_link",
		"value" => array(
			"Yes"  	=>  "yes",
			"No"  	=>  "no",
		),
		"std" => "yes",
		"dependency" => Array('element' => "cat_show_title", 'value' => array('yes')),
		'group' => __( 'Title', 'artmag-admin' )
    ),


    array(
		"type" => "dropdown",
		"heading" => __( "Link Position", "artmag-admin" ),
	    "param_name" => "cat_news_link_position",
		"value" => array(
			"Right"  	=>  "right",
			"Bottom"  	=>  "bottom",
		),
		"std" => "right",
		"dependency" => Array('element' => "cat_news_link", 'value' => array('yes')),
		'group' => __( 'Title', 'artmag-admin' )
    ),


  	array(
        "type" => "textfield",
        "holder" => "div",
        "heading" => __( "All News Link URL", "artmag-admin" ),
        "param_name" => "cat_news_link_url",
        "dependency" => Array('element' => "cat_news_link", 'value' => array('yes')),
        'group' => __( 'Title', 'artmag-admin' )
    ),

  	array(
        "type" => "textfield",
        "holder" => "div",
        "heading" => __( "All News Link Text", "artmag-admin" ),
        "param_name" => "cat_news_link_text",
        "dependency" => Array('element' => "cat_news_link", 'value' => array('yes')),
        'group' => __( 'Title', 'artmag-admin' )
    ),


    array(
		"type" => "checkbox",
		"heading" => __( "Category", "artmag-admin" ),
	    "param_name" => "cat_list",
		"value" => $listedcategories,
		"std" => "typo",
		'group' => __( 'Filter', 'artmag-admin' )
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "Post Format", "artmag-admin" ),
	    "param_name" => "post_format",
		"value" => array(
			"All"  => "all",
			"Audio"  => "audio",
			"Gallery"  => "gallery",
			"Link"  => "link",
			"Quote"  => "quote",
			"Video"  => "video",
		),
		"std" => "",
		'group' => __( 'Filter', 'artmag-admin' )
    ),


    array(
		"type" => "dropdown",
		"heading" => __( "Featured Posts Filter", "artmag-admin" ),
	    "param_name" => "cat_must_read",
		"value" => array(
			"No"  => "no",
			"Yes, Please!"  => "yes",
		),
		"std" => "no",
		'group' => __( 'Filter', 'artmag-admin' )
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "Author Name Visibiliy?", "artmag-admin" ),
	    "param_name" => "cat_author_v",
		"value" => array(
			"Hide"  	=>  "hide",
			"Show"  	=>  "show",
		),
		"std" => "show",
		'group' => __( 'Visibility', 'artmag-admin' )
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "Date Visibiliy?", "artmag-admin" ),
	    "param_name" => "cat_date_v",
		"value" => array(
			"Hide"  	=>  "hide",
			"Show"  	=>  "show",
		),
		"std" => "hide",
		'group' => __( 'Visibility', 'artmag-admin' )
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "Share Visibiliy?", "artmag-admin" ),
	    "param_name" => "cat_share_v",
		"value" => array(
			"Hide"  	=>  "hide",
			"Show"  	=>  "show",
		),
		"std" => "hide",
		'group' => __( 'Visibility', 'artmag-admin' )
    ),
    array(
		"type" => "dropdown",
		"heading" => __( "Post View Visibiliy?", "artmag-admin" ),
	    "param_name" => "cat_postview_v",
		"value" => array(
			"Hide"  	=>  "hide",
			"Show"  	=>  "show",
		),
		"std" => "hide",
		'group' => __( 'Visibility', 'artmag-admin' )
    ),
    array(
		"type" => "dropdown",
		"heading" => __( "Category Visibility?", "artmag-admin" ),
	    "param_name" => "cat_cat_v",
		"value" => array(
			"Hide"  	=>  "hide",
			"Show"  	=>  "show",
		),
		"std" => "hide",
		'group' => __( 'Visibility', 'artmag-admin' )
    ),
    array(
		"type" => "dropdown",
		"heading" => __( "Show Post Content?", "artmag-admin" ),
	    "param_name" => "cat_show_content",
		"value" => array(
			"Show"  	=>  "show",
			"Hide"  	=>  "hide",
		),
		"std" => "hide",
		'group' => __( 'Visibility', 'artmag-admin' )
    ),
	array(
        "type" => "textfield",
        "holder" => "div",
        "heading" => __( "Excerpt Value", "artmag-admin" ),
        "param_name" => "cat_excerpt_value",
        "value" => __( "28", "artmag-admin" ),
        "dependency" => Array('element' => "cat_show_content", 'value' => array('show')),
        'group' => __( 'Visibility', 'artmag-admin' )
    ),	
	
    array(
		"type" => "dropdown",
		"heading" => __( "Read More Button", "artmag-admin" ),
	    "param_name" => "cat_read_more",
		"value" => array(			
			"Show"  	=>  "show",
			"Hide"  	=>  "hide",
		),
		"std" => "hide",
		'group' => __( 'Visibility', 'artmag-admin' )
    ),

	array(
        "type" => "textfield",
        "holder" => "div",
        "heading" => __( "Post Limit", "artmag-admin" ),
        "param_name" => "cat_post_count",
        "value" => __( "3", "artmag-admin" ),
        "description" => __( "Enter -1 to display all", "artmag-admin" )
    ),	
    array(
		"type" => "dropdown",
		"heading" => __( "Order by", "artmag-admin" ),
	    "param_name" => "cat_order_by",
		"value" => array(
			"Date"  	=> "date",
			"Most Viewed"  => "meta_value_num",
			"Order by post ID"  => "ID",
			"Author"  => "author",
			"Title"  => "title",
			"Last modified date"  => "modified",
			"Post/page parent ID"  => "parent",
			"Number of comments"  => "comment_count",
			"Menu order/Page Order"  => "menu_order",
			"Meta value"  => "meta_value",
			"Random order"  => "rand",
		),
		"std" => "date",
		'group' => __( 'Data Settings', 'artmag-admin' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
    ),
    array(
		"type" => "dropdown",
		"heading" => __( "Sorting", "artmag-admin" ),
	    "param_name" => "cat_sorting",
		"value" => array(
			"Descending"  	=>  "DESC",
			"Ascending"  	=>  "ASC",
		),
		"std" => "DESC",
		'group' => __( 'Data Settings', 'artmag-admin' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
    ),

    ),
));



/*-----------------------------------------------------------------------------------*/
/*   Recent Post
/*-----------------------------------------------------------------------------------*/

if($artmag_opt['index-list-share-visibility'] == false ) { $artmag_opt['index-list-share-visibility'] = "no"; } else { $artmag_opt['index-list-share-visibility'] = "yes"; }
if($artmag_opt['index-list-cat-visibility'] == 1 ) { $artmag_opt['index-list-cat-visibility'] = "yes"; } else { $artmag_opt['index-list-cat-visibility'] = "no"; }
if($artmag_opt['index-content-full'] == true) { $artmag_opt['index-content-full'] = "yes"; } else { $artmag_opt['index-content-full'] = "no"; }
if($artmag_opt['index-read-more'] == true ) { $artmag_opt['index-read-more'] = "yes"; } else { $artmag_opt['index-read-more'] = "no"; }
if($artmag_opt['featured-image-cropping'] == 1 ) { $artmag_opt['featured-image-cropping'] = "crop"; } else { $artmag_opt['featured-image-cropping'] = "dont-crop"; }

$post_type = '"'.esc_attr($artmag_opt['index-post-type']).'"';
$share_v = esc_attr($artmag_opt['index-list-share-visibility']);
$cat_v = esc_attr($artmag_opt['index-list-cat-visibility']);
$full_text = esc_attr($artmag_opt['index-content-full']);
$read_more = esc_attr($artmag_opt['index-read-more']);
$f_image_crop = esc_attr($artmag_opt['featured-image-cropping']);

vc_map( array(
	"name" => __( "Recent Posts", "artmag-admin" ),
	"base" => "t_blog",
	"category" => __( "2035 Shortcode", "artmag-admin"),
	"description" => __( "by 2035Themes", "artmag-admin"),
	"params" => array(

    array(
		"type" => "dropdown",
		"heading" => __( "Post Style?", "artmag-admin" ),
	    "param_name" => "blog_style_show",
		"value" => array(
			"List"  		  =>  "list",
			"Full"  		  =>  "full",
		),
		"std" => $post_type,
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "Centered Post?", "artmag-admin" ),
	    "param_name" => "blog_centered_post",
		"value" => array(
			"No"  		  	=>  "no",
			"Yes, Please!"	=>  "yes",
		),
		"std" => "no",
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "Pagination", "artmag-admin" ),
	    "param_name" => "blog_recent_pagination",
		"value" => array(
			"No"  		  	=>  "no",
			"Yes, Please!"	=>  "yes",
		),
		"std" => "no",
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "Image Crop?", "artmag-admin" ),
	    "param_name" => "blog_image_crop",
		"value" => array(
			"Crop"  		  =>  "crop",
			"Dont Crop"  		  =>  "dont-crop",
		),
		"std" => $f_image_crop,
    ),
    array(
		"type" => "dropdown",
		"heading" => __( "News Title?", "artmag-admin" ),
	    "param_name" => "blog_show_title",
		"value" => array(
			"Yes"  	=>  "yes",
			"No"  	=>  "no",
		),
		"std" => "yes",
		'group' => __( 'Title', 'artmag-admin' )
    ),
  	array(
        "type" => "textfield",
        "holder" => "div",
        "heading" => __( "Latest Post Title", "artmag-admin" ),
        "param_name" => "blog_title",
        "dependency" => Array('element' => "blog_show_title", 'value' => array('yes')),
        'group' => __( 'Title', 'artmag-admin' )
    ),
    array(
		"type" => "dropdown",
		"heading" => __( "Title Seperator Style", "artmag-admin" ),
	    "param_name" => "blog_title_seperator",
		"value" => array(
			"Center Title | Two Line"  	=> "two-line",
			"Center Title | Bottom Line"  	=> "center-bottom-line",
			"Left Title | Vertical Middle Line"  => "middle-line",
			"Left Title | Top Line"  => "top-line",
			"Left Title | Bottom Line"  => "bottom-line",
		),
		"std" => "two-line",
		"dependency" => Array('element' => "blog_show_title", 'value' => array('yes')),
		'group' => __( 'Title', 'artmag-admin' )
    ),



   array(
		"type" => "dropdown",
		"heading" => __( "All News Link?", "artmag-admin" ),
	    "param_name" => "blog_title_news_link",
		"value" => array(
			"Yes"  	=>  "yes",
			"No"  	=>  "no",
		),
		"std" => "no",
		"dependency" => Array('element' => "blog_show_title", 'value' => array('yes')),
		'group' => __( 'Title', 'artmag-admin' )
    ),


  	array(
        "type" => "textfield",
        "holder" => "div",
        "heading" => __( "All News Link URL", "artmag-admin" ),
        "param_name" => "blog_title_news_link_url",
        "dependency" => Array('element' => "blog_title_news_link", 'value' => array('yes')),
        'group' => __( 'Title', 'artmag-admin' )
    ),

  	array(
        "type" => "textfield",
        "holder" => "div",
        "heading" => __( "All News Link Text", "artmag-admin" ),
        "param_name" => "blog_title_news_link_text",
        "dependency" => Array('element' => "blog_title_news_link", 'value' => array('yes')),
        'group' => __( 'Title', 'artmag-admin' )
    ),



    array(
		"type" => "dropdown",
		"heading" => __( "Show Share?", "artmag-admin" ),
	    "param_name" => "blog_show_share",
		"value" => array(
			"Hide"  	=>  "no",
			"Show"  	=>  "yes",
		),
		"std" => $share_v,
		'group' => __( 'Visibility', 'artmag-admin' )
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "Post View Visibiliy?", "artmag-admin" ),
	    "param_name" => "blog_show_postview",
		"value" => array(
			"Hide"  	=>  "hide",
			"Show"  	=>  "show",
		),
		"std" => "hide",
		'group' => __( 'Visibility', 'artmag-admin' )
    ),

    array(
		"type" => "dropdown",
		"heading" => __( "Category Visibility?", "artmag-admin" ),
	    "param_name" => "blog_show_cat",
		"value" => array(
			"Show"  	=>  "yes",
			"Hide"  	=>  "no",
		),
		"std" => $cat_v,
		'group' => __( 'Visibility', 'artmag-admin' )
    ),
    array(
		"type" => "dropdown",
		"heading" => __( "Show Full Post Content?", "artmag-admin" ),
	    "param_name" => "blog_show_content",
		"value" => array(
			"Yes"  	=>  "yes",
			"No"  	=>  "no",
		),
		"std" => $full_text,
		'group' => __( 'Visibility', 'artmag-admin' )
    ),
	array(
        "type" => "textfield",
        "holder" => "div",
        "heading" => __( "Excerpt Value", "artmag-admin" ),
        "param_name" => "blog_excerpt_value",
        "value" => __( "28", "artmag-admin" ),
        "dependency" => Array('element' => "blog_show_content", 'value' => array('yes')),
        'group' => __( 'Visibility', 'artmag-admin' )
    ),	
    array(
		"type" => "dropdown",
		"heading" => __( "Read More Button", "artmag-admin" ),
	    "param_name" => "blog_read_more",
		"value" => array(
			"Yes"  	=>  "yes",
			"No"  	=>  "no",
		),
		"std" => $read_more,
		'group' => __( 'Visibility', 'artmag-admin' )
    ),

    array(
		"type" => "checkbox",
		"heading" => __( "Category", "artmag-admin" ),
	    "param_name" => "blog_recent_cat_list",
		"value" => $listedcategories,
		"std" => "typo",
		'group' => __( 'Filter', 'artmag-admin' )
    ),

	array(
        "type" => "textfield",
        "holder" => "div",
        "heading" => __( "Total items", "artmag-admin" ),
        "param_name" => "blog_post_count",
        "value" => __( "4", "artmag-admin" ),
        "description" => __( "Enter -1 to display all", "artmag-admin" ),
        'group' => __( 'Data Settings', 'artmag-admin' )
    ),	
    array(
		"type" => "dropdown",
		"heading" => __( "Order by", "artmag-admin" ),
	    "param_name" => "blog_order_by",
		"value" => array(
			"Date"  	=> "date",
			"Most Viewed"  => "meta_value_num",
			"Order by post ID"  => "ID",
			"Author"  => "author",
			"Title"  => "title",
			"Last modified date"  => "modified",
			"Post/page parent ID"  => "parent",
			"Number of comments"  => "comment_count",
			"Menu order/Page Order"  => "menu_order",
			"Meta value"  => "meta_value",
			"Random order"  => "rand",
		),
		"std" => "date",
		'group' => __( 'Data Settings', 'artmag-admin' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
    ),
    array(
		"type" => "dropdown",
		"heading" => __( "Sorting", "artmag-admin" ),
	    "param_name" => "blog_sorting",
		"value" => array(
			"Descending"  	=>  "DESC",
			"Ascending"  	=>  "ASC",
		),
		"std" => "DESC",
		'group' => __( 'Data Settings', 'artmag-admin' ),
		'edit_field_class' => 'vc_col-sm-6 vc_column',
    ),




    ),
));

?>