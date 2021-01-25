<?php get_header();
the_post();
pageBanner();
?>

    <div class="container container--narrow page-section">
        <div class="generic-content">
            <div class="row group">
                <div class="one-third"><?php the_post_thumbnail( 'professorPortrait' ); ?></div>
                <div class="two-thirds"><?php the_content(); ?></div>
            </div>
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