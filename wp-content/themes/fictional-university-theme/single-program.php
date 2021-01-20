<?php get_header();
the_post();
$titleProgram = get_the_title();
?>

    <div class="page-banner">
        <div class="page-banner__bg-image"
             style="background-image: url(<?php echo get_theme_file_uri( '/assets/images/ocean.jpg' ); ?> );"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php echo $titleProgram; ?></h1>
            <div class="page-banner__intro">
				<?php $eventDate = new DateTime( get_field( 'event_date' ) ); ?>
                <p>Event date: <?php echo $eventDate->format( 'd M Y' ) ?></p>
            </div>
        </div>
    </div>

    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
				<?php
				$currentDate = new DateTime();
				?>
                <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link( 'program' ); ?>">
                    All Programs
                </a>
                <span class=" metabox__main"><?php echo $titleProgram; ?></span>
            </p>
        </div>
        <div class="generic-content"><?php the_content(); ?></div>

		<?php
		$events = new WP_Query( [
			'post_type'      => 'event',
			'posts_per_page' => 2,
			'meta_key'       => 'event_date',
			'meta_type'      => 'DATE',
			'orderby'        => 'meta_value_num',
			'order'          => 'ASC',
			'meta_query'     => [
				[
					'key'     => 'event_date',
					'compare' => '>=',
					'value'   => date( "Ymd" ),
					'type'    => 'numeric'
				],
				[
					'key'     => 'related_programs',
					'compare' => 'LIKE',
					'value'   => get_the_ID()
				]
			]
		] );
		?>

		<?php if ( $events->have_posts() ): ?>
            <hr class="section-break">
            <h2 class="headline headline--medium">Upcoming <?php the_title(); ?> events:</h2>

			<?php while ( $events->have_posts() ): $events->the_post(); ?>

                <div class="event-summary">
                    <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
                            <span class="event-summary__month"><?php
	                            $eventDate = new DateTime( get_field( 'event_date' ) );
	                            echo $eventDate->format( 'M' );
	                            ?></span>
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
			?>
		<?php endif; ?>
    </div>

<?php get_footer();