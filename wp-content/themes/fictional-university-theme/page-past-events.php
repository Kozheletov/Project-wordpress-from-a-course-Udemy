<?php get_header();
pageBanner();
?>


    <div class="container container--narrow page-section">

		<?php
		$events = new WP_Query( [
			'paged'          => get_query_var( 'paged', 1 ),
			'post_type'      => 'event',
			'meta_key'       => 'event_date',
			'meta_type'      => 'DATE',
			'orderby'        => 'meta_value_num',
			'order'          => 'ASC',
			'meta_query'     => [
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
			$eventDate = new DateTime( get_field( 'event_date' ) );
			?>

            <div class="event-summary">
                <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
                    <span class="event-summary__month"><?php echo $eventDate->format( 'M' ); ?></span>
                    <span class="event-summary__day"><?php echo $eventDate->format( 'd' ); ?></span>
                </a>
                <div class="event-summary__content">
                    <h5 class="event-summary__title headline headline--tiny">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                    <p><?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a></p>
                </div>
            </div>

		<?php
		endwhile;
		wp_reset_postdata();
		echo paginate_links( [
			'total' => $events->max_num_pages
		] );
		?>

    </div>

<?php
get_footer();
