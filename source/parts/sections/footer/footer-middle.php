<div class="footer__middle">
	<div class="footer__middle-inner">
		<span class="footer__title">
			<?php echo carbon_get_theme_option('footer_title_menu'); ?>
		</span>
		<?php echo apply_filters('the_content', carbon_get_theme_option('footer_hilfe_links')); ?>
	</div>
	<div class="footer__middle-inner">
		<span class="footer__title">
			GHOSTWRITING
		</span>
		<?php echo apply_filters('the_content', carbon_get_theme_option('footer_ghost_links')); ?>
	</div>
</div>