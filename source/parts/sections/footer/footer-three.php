<div class="footer__three">
	<div class="footer__three-left">
		<span class="footer__title">
			Fachbereiche
		</span>
		<?php echo apply_filters('the_content', carbon_get_theme_option('footer_fach_links')); ?>
	</div>
	<div class="footer__three-right">
		<div class="footer__three-lekt">
			<span class="footer__title">
				Lektorat & Korrekturlesen
			</span>
			<?php echo apply_filters('the_content', carbon_get_theme_option('footer_lekt_links')); ?>
		</div>
	</div>
</div>