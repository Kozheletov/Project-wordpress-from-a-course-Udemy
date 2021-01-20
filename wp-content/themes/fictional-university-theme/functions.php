<?php

function university_files() {
	wp_enqueue_style( 'google-custom-font',
		'//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i' );
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
	if ( strstr( $_SERVER['SERVER_NAME'], 'fictional-university.local' ) ) {
		wp_enqueue_script( 'main-university-js', 'http://localhost:3000/bundled.js', null, '1.0', true );
	} else {
		wp_enqueue_script( 'our-vendor-js', get_theme_file_uri( '/bundled-assets/vendors~scripts.8c97d901916ad616a264.js' ), null, '1.0',
			true );
		wp_enqueue_script( 'main-university-js', get_theme_file_uri( '/bundled-assets/scripts.bc49dbb23afb98cfc0f7.js' ), null, '1.0',
			true );
		wp_enqueue_style( 'our-main-styles', get_theme_file_uri( '/bundled-assets/styles.bc49dbb23afb98cfc0f7.css' ) );
	}

}

add_action( 'wp_enqueue_scripts', 'university_files' );

function university_features() {
	register_nav_menu( 'headerMenuLocation', 'Header Menu Location' );
	register_nav_menu( 'footerLocationOne', 'Footer Menu One' );
	register_nav_menu( 'footerLocationTwo', 'Footer Menu Two' );
	add_theme_support( 'title-tag' );
}

add_action( 'after_setup_theme', 'university_features' );

/**
 * Change the excerpt more string
 */
function university_excerpt() {
	return '...';
}

add_filter( 'excerpt_more', 'university_excerpt' );

function university_excerpt_length() {
	return 15;
}

add_filter( 'excerpt_length', 'university_excerpt_length' );

function university_adjust_query( $query ) {
	// filter for display programs an archive-program page
	if ( ! is_admin() && is_post_type_archive( 'program' ) && $query->is_main_query() ) {
		$query->set( 'orderby', 'title' );
		$query->set( 'order', 'ASC' );
		$query->set( 'posts_per_page', - 1 );
	}

	if ( ! is_admin() && is_post_type_archive( 'event' ) && $query->is_main_query() ) {
		$today = date( "Ymd" );
		$query->set( 'meta_key', 'event_date' );
		$query->set( 'orderby', 'meta_value_num' );
		$query->set( 'order', 'ASC' );
		$query->set( 'meta_query', [
			[
				'key'     => 'event_date',
				'compare' => '>=',
				'value'   => $today,
				'type'    => 'numeric'
			]
		] );
	}
}

add_action( 'pre_get_posts', 'university_adjust_query' );