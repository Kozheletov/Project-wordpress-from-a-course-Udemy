<?php

function university_post_type() {
	// Event Post Type
	register_post_type( 'event', [
		'show_in_rest' => true,
		'supports'     => [ 'title', 'editor', 'excerpt' ],
		'public'       => true,
		'labels'       => [
			'name'          => 'Events',
			'singular_name' => 'Event',
			'add_new'       => 'Add new event',
			'add_new_item'  => 'Add New Event',
			'edit_item'     => 'Edit Event',
			'all_items'     => 'All Events'
		],
		'menu_icon'    => 'dashicons-calendar',
		'has_archive'  => true,
		'rewrite'      => [
			'slug' => 'events'
		]
	] );

	// Program Post Type
	register_post_type( 'program', [
		'show_in_rest' => true,
		'supports'     => [ 'title', 'editor' ],
		'public'       => true,
		'labels'       => [
			'name'          => 'Programs',
			'singular_name' => 'Program',
			'add_new'       => 'Add new Program',
			'add_new_item'  => 'Add New Program',
			'edit_item'     => 'Edit Program',
			'all_items'     => 'All Programs'
		],
		'menu_icon'    => 'dashicons-awards',
		'has_archive'  => true,
		'rewrite'      => [
			'slug' => 'programs'
		]
	] );

	// Professor Post Type
	register_post_type( 'professor', [
		'show_in_rest' => true,
		'public'       => true,
		'supports'     => [ 'title', 'editor', 'thumbnail' ],
		'labels'       => [
			'name'          => 'Professors',
			'singular_name' => 'Professor',
			'add_new'       => 'Add new Professor',
			'add_new_item'  => 'Add New Professor',
			'edit_item'     => 'Edit Professor',
			'all_items'     => 'All Professors'
		],
		'menu_icon'    => 'dashicons-welcome-learn-more'
	] );

	// Campus Post Type
	register_post_type( 'campus', [
		'show_in_rest' => true,
		'public'       => true,
		'supports'     => [ 'title', 'editor', 'excerpt' ],
		'has_archive'  => true,
		'rewrite'      => [ 'slug' => 'campuses' ],
		'labels'       => [
			'name'          => 'Campuses',
			'singular_name' => 'Campus',
			'add_new'       => 'Add new Campus',
			'add_new_item'  => 'Add New Campus',
			'edit_item'     => 'Edit Campus',
			'all_items'     => 'All Campuses'
		],
		'menu_icon'    => 'dashicons-location-alt'
	] );
}

add_action( 'init', 'university_post_type' );