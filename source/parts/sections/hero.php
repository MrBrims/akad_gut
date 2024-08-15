<section class="hero">
	<div class="container">
		<div class="hero__items">
			<div class="hero__item">
				<?php
				if (!is_front_page() && function_exists('yoast_breadcrumb')) {
					echo	'<div class="single-breadcrumb hero__breadcrumb">';
					yoast_breadcrumb('<div class="single-breadcrumb__list">', '</div>');
					echo '</div>';
				}
				?>
				<h1 class="hero__title">
					<?php the_title() ?>
				</h1>
				<div class="hero__text">
					<?php echo carbon_get_post_meta(get_the_ID(), 'hero_text'); ?>
				</div>
				<?php
				get_template_part('parts/blocks/rating');
				if (get_the_ID() == 1329) get_template_part('parts/blocks/guarant-block');
				?>
			</div>
			<div class="hero__item">
				<div class="hero__form-box">
					<?php if (!empty(carbon_get_post_meta(get_the_ID(), 'ak_hero_form_title'))) : ?>
						<p class="hero__form-title">
							<?php echo carbon_get_post_meta(get_the_ID(), 'ak_hero_form_title'); ?>
						</p>
					<?php endif ?>
					<?php get_template_part(carbon_get_post_meta(get_the_ID(), 'ak_hero_form')); ?>
				</div>
				<img class="hero__decore-img" src="<?php echo carbon_get_post_meta(get_the_ID(), 'hero_img'); ?>" alt="<?php Helpers::imageAlt(carbon_get_post_meta(get_the_ID(), 'hero_img')); ?>">
			</div>
		</div>
		<?php if (get_the_ID() == 1329) get_template_part('parts/blocks/accent-block'); ?>
	</div>
</section>