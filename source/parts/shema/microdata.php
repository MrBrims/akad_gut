<?php
$current_url = home_url() . $_SERVER['REQUEST_URI'];
$random_rating = rand(49, 50) / 10;
$random_price = rand(49, 50);
$random_all_rating = rand(372, 391);
?>

<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "SoftwareApplication",
        "url": "<?php echo $current_url; ?>",
        "name": "<?php the_title(); ?>",
        "softwareVersion": "1.0",
        "description": "Unsere erfahrenen Betreuer helfen Ihnen beim Verfassen Ihrer akademischen Arbeit",
        "inLanguage": "de",
        "applicationCategory": "https://schema.org/OtherApplication",
        "aggregateRating": {
            "@type": "AggregateRating",
            "worstRating": "1",
            "bestRating": "5",
            "ratingValue": "<?php if (!empty(carbon_get_post_meta(get_the_ID(), 'microdata_rating'))) {
                                echo carbon_get_post_meta(get_the_ID(), 'microdata_rating');
                            } else {
                                echo $random_rating;
                            } ?>",
            "ratingCount": "<?php if (!empty(carbon_get_post_meta(get_the_ID(), 'microdata_all_rating'))) {
                                echo carbon_get_post_meta(get_the_ID(), 'microdata_all_rating');
                            } else {
                                echo $random_all_rating;
                            } ?>"
        },
        "offers": {
            "@type": "AggregateOffer",
            "lowprice": "<?php if (!empty(carbon_get_post_meta(get_the_ID(), 'microdata_price'))) {
                                echo carbon_get_post_meta(get_the_ID(), 'microdata_price');
                            } else {
                                echo $random_price;
                            } ?>",
            "priceCurrency": "EUR"
        }
    }
</script>