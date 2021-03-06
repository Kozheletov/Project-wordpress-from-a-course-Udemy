<?php get_header();
the_post();
$titleProgram = get_the_title();
pageBanner();
?>

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
		$relatedProfessors = new WP_Query( [
			'post_type'      => 'professor',
			'posts_per_page' => - 1,
			'orderby'        => 'title',
			'order'          => 'ASC',
			'meta_query'     => [
				[
					'key'     => 'related_programs',
					'compare' => 'LIKE',
					'value'   => get_the_ID()
				]
			]
		] );
		?>

		<?php if ( $relatedProfessors->have_posts() ): ?>
            <hr class="section-break">
            <h2 class="headline headline--medium"><?php the_title(); ?> Professor(s):</h2>
            <ul class="professor-cards">
				<?php while ( $relatedProfessors->have_posts() ): $relatedProfessors->the_post(); ?>
                    <li class="professor-card__list-item">
                        <a class="professor-card" href="<?php the_permalink(); ?>">
                            <img class="professor-card__image"
                                 src="<?php the_post_thumbnail_url( 'professorLandscape' ); ?>"
                                 alt="<?php the_title(); ?>">
                            <span class="professor-card__name"><?php the_title(); ?></span>
                        </a>
                    </li>
				<?php
				endwhile;
				wp_reset_postdata();
				?>
            </ul>
		<?php endif;

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

			<?php while ( $events->have_posts() ): $events->the_post();
				get_template_part( 'template-parts/content', 'event' );
			endwhile;
			wp_reset_postdata();
			?>
		<?php endif; ?>
    </div>

<?php get_footer();