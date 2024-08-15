<div class="footer__two">
	<div class="footer__two-inner">
		<span class="footer__title">
			Über uns
		</span>
		<?php echo apply_filters('the_content', carbon_get_theme_option('footer_uber_links')); ?>
	</div>
	<div class="footer__two-inner">
		<span class="footer__title">
			Blog
		</span>
		<?php echo apply_filters('the_content', carbon_get_theme_option('footer_blog_links')); ?>
	</div>
	<div class="footer__two-inner">
		<?php echo apply_filters('the_content', carbon_get_theme_option('footer_other_links')); ?>
	</div>
	<div class="footer__two-inner">
		<div class="footer__reviews">
			<span class="footer__title">
				<?php echo carbon_get_theme_option('footer_title_rev'); ?>
			</span>
			<div class="footer__reviews-items">
				<?php foreach ((carbon_get_theme_option('footer_rev')) as $key) : ?>
					<div class="footer__reviews-item">
						<img class="footer__reviews-img" src="<?php echo $key['footer_rev_icons']; ?>" alt="<?php Helpers::imageAlt($key['footer_rev_icons']); ?>">
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="footer__plagiat">
			<span class="footer__title">
				PLAGIATSSOFTWARE
			</span>
			<div class="footer__plagiat-items">
				<?php foreach ((carbon_get_theme_option('footer_icons_plag')) as $key) : ?>
					<div class="footer__plagiat-item">
						<img class="footer__plagiat-img" src="<?php echo $key['footer_icon_plag']; ?>" alt="<?php Helpers::imageAlt($key['footer_icon_plag']); ?>">
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>