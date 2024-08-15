<div class="footer__bottom">
	<div class="footer__bottom-left">
		<p class="footer__text">
			<?php echo carbon_get_theme_option('footer_text'); ?>
		</p>
		<p class="footer__address">
			<?php
			if (is_page_template('parts/page-uber-kont.php')) {
				echo "Mexpi Limited 18 Granville Avenue Oadby, Leicester LE2 5FL United Kingdom";
			} else {
				echo carbon_get_theme_option('global__adress');
			}
			?>
		</p>
	</div>
	<div class="footer__bottom-right">
		<?php foreach ((carbon_get_theme_option('footer_icons_trust')) as $key) : ?>
			<img class="footer__bottom-icon" src="<?php echo $key['footer_icon_trust']; ?>" alt="<?php Helpers::imageAlt($key['footer_icon_trust']); ?>">
		<?php endforeach; ?>
	</div>
</div>