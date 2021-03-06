<?php

function pageBanner( $args = null ) {
	if ( ! $args['title'] ) {
		$args['title'] = get_the_title();
	}
	if ( ! $args['subtitle'] ) {
		$args['subtitle'] = get_field( 'page_banner_subtitle' );
	}
	if ( ! $args['photo'] ) {
		if ( get_field( 'page_banner_background_image' && ! is_archive() && ! is_home() ) ) {
			$args['photo'] = get_field( 'page_banner_background_image' )['sizes']['pageBanner'];
		} else {
			$args['photo'] = get_theme_file_uri( '/images/ocean.jpg' );
		}
	}
	?>
    <div class="page-banner">
        <div class="page-banner__bg-image"
             style="background-image: url(<?php echo $args['photo'] ?> );">
        </div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php echo $args['title']; ?></h1>
            <div class="page-banner__intro">
                <p><?php echo $args['subtitle']; ?></p>
            </div>
        </div>
    </div>
	<?php
}

function university_files() {
	wp_enqueue_style( 'google-custom-font',
		'//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i' );
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
	if ( strstr( $_SERVER['SERVER_NAME'], 'fictional-university.local' ) ) {
		wp_enqueue_script( 'main-university-js', 'http://localhost:3000/bundled.js', null, '1.0', true );
	} else {
		wp_enqueue_script( 'our-vendor-js', get_theme_file_uri( '/bundled-assets/vendors~scripts.8c97d901916ad616a264.js' ), null, '1.0',
			true );
		wp_enqueue_script( 'main-university-js', get_theme_file_uri( '/bundled-assets/scripts.08d4128aa35719dbcaae.js' ), null, '1.0',
			true );
		wp_enqueue_style( 'our-main-styles', get_theme_file_uri( '/bundled-assets/styles.08d4128aa35719dbcaae.css' ) );
	}
	if ( get_post_type() === 'campus' ) {
		wp_enqueue_script( 'two-gis-maps-script', "https://maps.api.2gis.ru/2.0/loader.js?pkg=full", null, '2.0', false );
	}

}

add_action( 'wp_enqueue_scripts', 'university_files' );

function university_features() {
	register_nav_menu( 'headerMenuLocation', 'Header Menu Location' );
	register_nav_menu( 'footerLocationOne', 'Footer Menu One' );
	register_nav_menu( 'footerLocationTwo', 'Footer Menu Two' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'professorLandscape', 400, 260, true );
	add_image_size( 'professorPortrait', 480, 650, true );
	add_image_size( 'pageBanner', 1500, 350, true );
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

// filter for display events an archive-event page
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