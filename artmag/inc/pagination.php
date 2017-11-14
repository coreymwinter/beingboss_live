<?php

/* PAGINATION */
function artmag_fm_pagination(){
	if( is_singular() )
		return;
	global $wp_query;
	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;
	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );
	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;
	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}
	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}
	echo '<div class="pagination pos-center"><ul>' . "\n";
	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li class="last">%s</li>' . "\n", get_previous_posts_link("&larr; Previous Page") );
	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
		if ( ! in_array( 2, $links ) )
			echo '<li><p>…</p></li>';
	}
	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}
	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li><p>…</p></li>' . "\n";
		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}
	/**	Next Post Link */
	if(is_rtl()){
	if ( get_next_posts_link() )
		printf( '<li class="last">%s</li>' . "\n", get_next_posts_link("Next Page &#8592;") );
	echo '</ul></div>' . "\n";
	}else{
		if ( get_next_posts_link() )
		printf( '<li class="last">%s</li>' . "\n", get_next_posts_link("Next Page &#8594;") );
	echo '</ul></div>' . "\n";
	}
}
/* PAGINATION */

function artmag_fm_pagination_shortcode($max_num = 0){
	/** Stop execution if there's only 1 page */
	if( $max_num <= 1 )
		return;
	
if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
else { $paged = 1; }

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;
	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}
	if ( ( $paged + 2 ) <= $max_num ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}
	echo '<div class="pagination pos-center"><ul>' . "\n";
	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li class="last">%s</li>' . "\n", get_previous_posts_link("&larr; Previous Page") );
	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
		if ( ! in_array( 2, $links ) )
			echo '<li><p>…</p></li>';
	}
	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}
	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max_num, $links ) ) {
		if ( ! in_array( $max_num - 1, $links ) )
			echo '<li><p>…</p></li>' . "\n";
		$class = $paged == $max_num ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max_num ) ), $max_num );
	}
	/**	Next Post Link */
	if(is_rtl()){
	if ( get_next_posts_link('', $max_num) )
		printf( '<li class="last">%s</li>' . "\n", get_next_posts_link("Next Page &#8592;", $max_num) );
	echo '</ul></div>' . "\n";
	}else{
		if ( get_next_posts_link('', $max_num) )
		printf( '<li class="last">%s</li>' . "\n", get_next_posts_link("Next Page &#8594;", $max_num) );
	echo '</ul></div>' . "\n";
	}
}
?>