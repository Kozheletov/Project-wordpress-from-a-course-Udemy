<?php get_header();
pageBanner( [
	'title'    => 'Our Campuses',
	'subtitle' => 'We have several conveniently located campuses.'
] );
$mapLocations = [];
?>
    <div class="container container--narrow page-section">

		<?php while ( have_posts() ): the_post(); ?>
			<?php
			$mapLocations[] = get_fields();
		endwhile;
		?>

        <div id="map" style="width:100%; height:400px"></div>
        <script>
            DG.then(function () {

                map = DG.map('map', {
					<?php foreach ($mapLocations as $location):?>
                    'center': [<?=$location['latitude']?>, <?=$location['longitude']?>],
					<?php endforeach;?>
                    'zoom': 9
                });
				<?php foreach ($mapLocations as $location):?>
                DG.marker([<?=$location['latitude']?>, <?=$location['longitude']?>]).addTo(map).bindPopup('<?=$location['message_popup']?>');
				<?php endforeach;?>
            });
        </script>
    </div>

<?php
get_footer();