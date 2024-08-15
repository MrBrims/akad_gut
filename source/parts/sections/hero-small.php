<section class="hero hero-small" style="background-image: url(<?php echo carbon_get_post_meta(get_the_ID(), 'herosmall_bg'); ?>);">
	<div class="container">
		<?php if (!is_front_page() && function_exists('yoast_breadcrumb')) { ?>
			<div class="single-breadcrumb">
				<?php yoast_breadcrumb('<div class="single-breadcrumb__list">', '</div>'); ?>
			</div>
		<?php } ?>
	</div>
	<div class="container">
		<h1 class="hero__title">
			<?php the_title() ?>
		</h1>
	</div>
</section>