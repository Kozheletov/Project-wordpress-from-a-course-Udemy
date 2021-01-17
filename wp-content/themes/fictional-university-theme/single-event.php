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
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
				<?php
				$currentDate = new DateTime();
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
    </div>

<?php get_footer();