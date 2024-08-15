<?php
$type_review = carbon_get_post_meta(get_the_ID(), 'ak_complex_fields_page');
foreach ($type_review as $key) {
	if ($key['_type'] == 'template_unic_review') {
		$type_review = $key['unic_review_type'];
	}
}
$review_arr = null;
switch ($type_review) {
	case 'coach':
		$review_arr = carbon_get_theme_option('soc_reviews_coach');
		break;
	case 'lektor':
		$review_arr = carbon_get_theme_option('soc_reviews_lektor');
		break;
	default:
		$review_arr = carbon_get_theme_option('soc_reviews');
		break;
}
?>
<section class="section reviews">
	<div class="container">
		<?php if (!empty(carbon_get_theme_option('reviews_title'))) : ?>
			<h2 class="title reviews__title">
				<?php echo carbon_get_theme_option('reviews_title'); ?>
			</h2>
		<?php endif ?>
		<div class="reviews__stars">
			<?php get_template_part('parts/blocks/rating') ?>
		</div>
		<div class="soc-rev">
			<div class="soc-rev__body swiper">
				<div class="soc-rev__wrapper swiper-wrapper">
					<?php foreach ($review_arr as $key) : ?>
						<div class="soc-rev__slide swiper-slide">
							<a class="soc-rev__slide-link" href="<?php echo $key['soc_reviews_img']; ?>" data-fancybox="gallery">
								<img class="soc-rev__slide-img" src="<?php echo $key['soc_reviews_img']; ?>" alt="<?php Helpers::imageAlt($key['soc_reviews_img']); ?>">
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>

		<div class="resp-rev">
			<div class="resp-rev__body swiper">
				<div class="resp-rev__slider swiper-wrapper">
					<?php foreach ((carbon_get_theme_option('resp_rev')) as $key) : ?>
						<div class="resp-rev__slide swiper-slide">
							<div class="resp-rev__inner">
								<a class="resp-rev__link" target="_blank" href="<?php echo $key['resp_rev_link']; ?>">
									<?php echo $key['resp_rev_title']; ?>
								</a>
								<div class="resp-rev__star-box">
									<?php
									$rating = floatval($key['resp_rev_star']) * 2;
									$stars = intdiv($rating, 2);

									for ($i = 0; $i < $stars; $i++) {
										echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="rgba(255,189,0,1)"></path></svg>';
									}

									if ($rating % 2 != 0) {
										echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"><path d="M12.0006 15.968L16.2473 18.3451L15.2988 13.5717L18.8719 10.2674L14.039 9.69434L12.0006 5.27502V15.968ZM12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="rgba(255,189,0,1)"></path></svg>';
									}
									?>
								</div>
								<div class="resp-rev__text">
									<?php echo apply_filters('the_content', $key['resp_rev_text']); ?>
								</div>
								<div class="resp-rev__footer">
									<span class="resp-rev__name">
										<?php echo $key['resp_rev_name']; ?>
									</span>
									<span class="resp-rev__date">
										<?php echo $key['resp_rev_date']; ?>
									</span>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>