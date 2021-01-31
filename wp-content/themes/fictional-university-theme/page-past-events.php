<?php get_header();
pageBanner();
?>


    <div class="container container--narrow page-section">

		<?php
		$events = new WP_Query( [
			'paged'      => get_query_var( 'paged', 1 ),
			'post_type'  => 'event',
			'meta_key'   => 'event_date',
			'meta_type'  => 'DATE',
			'orderby'    => 'meta_value_num',
			'order'      => 'ASC',
			'meta_query' => [
				[
					'key'     => 'event_date',
					'compare' => '<',
					'value'   => date( "Ymd" ),
					'type'    => 'numeric'
				]
			]
		] );
		?>

		<?php
		while ( $events->have_posts() ): $events->the_post();
			get_template_part( 'template-parts/content', 'event' );
		endwhile;
		wp_reset_postdata();
		echo paginate_links( [
			'total' => $events->max_num_pages
		] );
		?>

    </div>

<?php
get_footer();
