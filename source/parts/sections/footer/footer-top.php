<div class="footer__top">
	<img class="footer__logo" src="<?php echo carbon_get_theme_option('footer_logo'); ?>" alt="footer logo">
	<div class="footer__contact">
		<a class="footer__mail" href="mailto:<?php echo carbon_get_theme_option('global_email'); ?>">
			<?php echo carbon_get_theme_option('global_email'); ?>
		</a>
		<div class="footer__soc">
			<?php foreach ((carbon_get_theme_option('footer_soc')) as $key) : ?>
				<a class="footer__soc-link" href="<?php echo $key['footer_link_soc']; ?>">
					<img class="footer__soc-icon" src="<?php echo $key['footer_icon_soc']; ?>" alt="<?php Helpers::imageAlt($key['footer_icon_soc']); ?>">
				</a>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="footer__schedule">
		<span class="footer__title">
			<?php echo carbon_get_theme_option('footer_title_schedule'); ?>
		</span>
		<div class="footer__schedule-time">
			<?php echo carbon_get_theme_option('global_time'); ?>
		</div>
		<div class="footer__schedule-text">
			<?php echo carbon_get_theme_option('footer_schedule_text'); ?>
		</div>
	</div>
	<div class="footer__pay">
		<span class="footer__title">
			<?php echo carbon_get_theme_option('footer_title_pay'); ?>
		</span>
		<div class="footer__pay-items">
			<?php foreach ((carbon_get_theme_option('footer_pay')) as $key) : ?>
				<div class="footer__pay-item">
					<img class="footer__pay-img" src="<?php echo $key['footer_pay_icons']; ?>" alt="<?php Helpers::imageAlt($key['footer_pay_icons']); ?>">
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>