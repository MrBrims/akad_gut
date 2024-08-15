<div class="sticky-block">
	<div class="team">
		<h3 class="team__title">
			Unsere Kundenbetreuer
		</h3>
		<div class="team__body swiper">
			<div class="team__wrapper swiper-wrapper">
				<?php foreach ((carbon_get_theme_option('team_card')) as $key) : ?>
					<div class="team__slide swiper-slide">
						<div class="team__slide-inner">
							<img class="swiper-lazy team__img" src="<?php echo $key['team_card_img']; ?>" alt="<?php Helpers::imageAlt($key['team_card_img']); ?>">
							<div class="team__content">
								<div class="team__name">
									<?php echo $key['team_card_name']; ?>
								</div>
								<div class="team__position">
									<?php echo $key['team_card_position']; ?>
								</div>
								<a class="team__whatsapp js-wapp" href="https://wa.me/<?php echo preg_replace('/[^,.0-9]/', '', $key['team_card_tel']); ?>">
									<?php echo $key['team_card_tel']; ?>
								</a>
								<a class="team__mail" href="mailto:<?php echo $key['team_card_mail']; ?>">
									<?php echo $key['team_card_mail']; ?>
								</a>
								<span class="team__times">
									<?php echo $key['team_card_time']; ?>
								</span>
								<a class="btn team__btn popup-link" href="#popup-form">
									Jetzt anfragen
								</a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="team__nav"></div>
	</div>
</div>