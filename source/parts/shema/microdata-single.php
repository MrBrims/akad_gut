<?php
$current_url = home_url() . $_SERVER['REQUEST_URI'];
$random_rating = rand(48, 50) / 10;
$random_all_rating = rand(372, 745);
?>

<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "CreativeWorkSeries",
		"name": "Akademily",
		"url": "<?php echo $current_url; ?>",
		"aggregateRating": {
			"@type": "AggregateRating",
			"worstRating": "1",
			"bestRating": "5",
			"ratingValue": "<?php if (!empty(carbon_get_post_meta(get_the_ID(), 'rating_value_md'))) {
												echo carbon_get_post_meta(get_the_ID(), 'rating_value_md');
											} else {
												echo $random_rating;
											} ?>",
			"ratingCount": "<?php if (!empty(carbon_get_post_meta(get_the_ID(), 'rating_count_md'))) {
												echo carbon_get_post_meta(get_the_ID(), 'rating_count_md');
											} else {
												echo $random_all_rating;
											} ?>"
		}
	}
</script>