<?php get_header();
while ( have_posts() ):
	the_post();
	pageBanner();
	?>

    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
				<?php
				$currentDate = new DateTime();
				$eventDate   = new DateTime( get_field( 'event_date' ) );
				?>
                <a class="metabox__blog-home-link"
                   href="<?php echo ( $eventDate > $currentDate ) ? get_post_type_archive_link( 'event' ) : site_url( '/past-events' ); ?>
                   ">
					<?php echo ( $eventDate > $currentDate ) ? 'Events Home' : 'Past Events' ?>
                </a>
                <span class=" metabox__main"><?php the_title(); ?></span>
            </p>
        </div>
        <div class="generic-content">
			<?php the_content(); ?>
        </div>
		<?php if ( $programs = get_field( 'related_programs' ) ): ?>
            <hr class="section-break">
            <h2 class="headline headline--medium">Related program(s):</h2>
            <ul class="link-list min-list">
				<?php foreach ( $programs as $program ): ?>
                    <li><a href="<?php the_permalink( $program ); ?>"><?php echo get_the_title( $program ); ?></a></li>
				<?php endforeach; ?>
            </ul>
		<?php endif; ?>
    </div>


<?php
endwhile;
get_footer();