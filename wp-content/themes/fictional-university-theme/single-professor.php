<?php get_header();
the_post();
?>

    <div class="page-banner">
        <div class="page-banner__bg-image"
             style="background-image: url(<?php echo get_theme_file_uri( '/assets/images/ocean.jpg' ); ?> );"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php the_title(); ?></h1>
            <div class="page-banner__intro">
				<?php $eventDate = new DateTime( get_field( 'event_date' ) ); ?>
                <p>Event date: <?php echo $eventDate->format( 'd M Y' ) ?></p>
            </div>
        </div>
    </div>

    <div class="container container--narrow page-section">
        <div class="generic-content">
			<?php the_content(); ?>
        </div>
		<?php if ( $programs = get_field( 'related_programs' ) ): ?>
            <hr class="section-break">
            <h2 class="headline headline--medium">Subject(s) taught:</h2>
            <ul class="link-list min-list">
				<?php foreach ( $programs as $program ): ?>
                    <li><a href="<?php the_permalink( $program ); ?>"><?php echo get_the_title( $program ); ?></a></li>
				<?php endforeach; ?>
            </ul>
		<?php endif; ?>
    </div>

<?php get_footer();