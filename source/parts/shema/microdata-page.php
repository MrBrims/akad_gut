<?php
$post_id = get_the_ID();
$current_url = home_url() . $_SERVER['REQUEST_URI'];
$meta_description = get_post_meta($post_id, '_yoast_wpseo_metadesc', true);
$rating_value = carbon_get_post_meta(get_the_ID(), 'rating_value_pmd');
$rating_count = carbon_get_post_meta(get_the_ID(), 'rating_count_pmd');
$price_page = carbon_get_post_meta(get_the_ID(), 'price_pmd');
?>
<?php if (!empty($rating_value)) : ?>
	<script type="application/ld+json">
		{
			"@context": "https://schema.org",
			"@type": "SoftwareApplication",
			"url": "<?php echo $current_url ?>",
			"name": "<?php the_title() ?>",
			"softwareVersion": "1",
			"description": "<?php echo $meta_description; ?>",
			"inLanguage": "de",
			"applicationCategory": "https://schema.org/OtherApplication",
			"aggregateRating": {
				"@type": "AggregateRating",
				"worstRating": "1",
				"bestRating": "5",
				"ratingValue": "<?php echo $rating_value ?>",
				"ratingCount": "<?php echo $rating_count ?>"
			},
			"offers": {
				"@type": "AggregateOffer",
				"lowprice": "<?php echo $price_page ?>",
				"priceCurrency": "EUR"
			}
		}
	</script>
<?php endif ?>