<?php get_header();
the_post();
pageBanner();
?>

    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="<?php if ( is_singular( 'campus' ) ) {
					echo site_url( '/campuses' );
				} else {
					echo site_url( '/blog' );
				} ?>">
					<?php if ( is_singular( 'campus' ) ) {
						echo 'Our Campuses';
					} else {
						echo 'Blog Home';
					}
					?>
                </a>
                <span class="metabox__main">Posted by <?php the_author_posts_link(); ?> on <?php the_time( 'n.j.y' ); ?>
                in <?php echo get_the_category_list( ', ' ); ?></span>
            </p>
        </div>
        <div class="generic-content">
			<?php the_content(); ?>
        </div>
		<?php if ( is_singular( 'campus' ) ):
			$mapLocation = get_fields();
			?>
            <div id="map" style="width:100%; height:400px"></div>
            <script>
                DG.then(function () {
                    map = DG.map('map', {
                        'center': [<?=$mapLocation['latitude']?>, <?=$mapLocation['longitude']?>],
                        'zoom': 16
                    });
                    DG.marker([<?=$mapLocation['latitude']?>, <?=$mapLocation['longitude']?>]).addTo(map).bindPopup('<?=$mapLocation['message_popup']?>');
                });
            </script>
		<?php endif; ?>
    </div>

<?php get_footer();