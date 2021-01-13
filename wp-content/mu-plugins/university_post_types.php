<?php

function university_post_type() {
	register_post_type( 'events', [
		'public'    => true,
		'labels'    => [
			'name'          => 'Events',
			'singular_name' => 'Event',
			'add_new'       => 'Add new event',
			'add_new_item'  => 'Add New Event',
			'edit_item'     => 'Edit Event',
			'all_items'     => 'All Events'
		],
		'menu_icon' => 'dashicons-calendar'
	] );
}

add_action( 'init', 'university_post_type' );