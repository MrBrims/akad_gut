<div class="accordion accordion-work">
	<?php foreach ((carbon_get_theme_option('accordeon_work')) as $key) : ?>
		<div class="accordion__item accordion-work__item">
			<img class="accordion-work__img" src="<?php echo $key['accordeon_work_image']; ?>" alt="<?php Helpers::imageAlt($key['accordeon_work_image']); ?>">
			<div class="accordion-work__inner">
				<div class="accordion__header accordion-work__head">
					<?php if (!empty($key['accordeon_work_title'])) : ?>
						<h3 class="accordion-work__title">
							<div class="accordion-work__title-icons">
								<svg width="40" height="40" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M0 40A40 40 0 0 1 40 0v40H0Z" fill="#BBD1DC" />
								</svg>
							</div>
							<?php echo $key['accordeon_work_title']; ?>
						</h3>
					<?php endif ?>
				</div>
				<div class="accordion__content accordion-work__content">
					<div style="min-height:0;">
						<p class="accordion-work__text">
							<?php echo $key['accordeon_work_text']; ?>
						</p>
						<?php if (!empty($key['accordeon_work_btn_show'])) : ?>
							<a class="accordion-work__btn btn popup-link" href="#popup-form">
								<?php echo $key['accordeon_work_btn']; ?>
							</a>
						<?php endif; ?>
					</div>
				</div>
				<div class="accordion-work__inner-icon">
					<img src="<?php echo get_template_directory_uri() ?>/resources/images/icons/pluse-new.svg" alt="pluse">
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>