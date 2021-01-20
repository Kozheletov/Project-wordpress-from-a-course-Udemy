<?php

function university_post_type() {
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
		'supports'     => [ 'title', 'editor'],
		'public'       => true,
		'labels'       => [
			'name'          => 'Programs',
			'singular_name' => 'Program',
			'add_new'       => 'Add new program',
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
}

add_action( 'init', 'university_post_type' );