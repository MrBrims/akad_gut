<section class="contact section">
	<div class="container">
		<?php if (!empty(carbon_get_theme_option('contact_whatsapp_title'))) : ?>
			<p class="title contact__title">
				<?php echo carbon_get_theme_option('contact_whatsapp_title'); ?>
			</p>
		<?php endif ?>
		<p class="contact__subtitle">
			<?php echo carbon_get_theme_option('contact__whatsapp_subtitle'); ?>
		</p>
		<a class="contact__btn js-wapp" target="_blank" href="https://wa.me/<?php echo preg_replace('/[^,.0-9]/', '', Helpers::num_whats()); ?>">
			<?php echo carbon_get_theme_option('contact__whatsapp_btn'); ?>
		</a>
	</div>
</section>