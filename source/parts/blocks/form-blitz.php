<form action="" class="form form-blitz">
	<div class="form-blitz__items">
		<div class="form-blitz__item">
			<span class="form__text">
				<span class="form__required-field">*</span> E-Mail <span class="form__tippy" data-tippy-content="Bitte geben Sie Ihre echte E-Mail-Adresse an. Vor dem Absenden überprüfen Sie bitte die angegebene E-Mail-Adresse noch einmal."></span>
			</span>
			<input class="form-blitz__input input" name="email" type="email" placeholder="E-Mail..." required>
		</div>
		<div class="form-blitz__item submit">
			<span class="form__text"></span>
			<input class="form__btn btn" type="submit" value="ABSCHICKEN">
		</div>
	</div>

	<input type="hidden" name="form-id" value="blitz-form">
	<input type="hidden" name="page_link" value="<?php echo get_permalink(); ?>">
	<input type="hidden" name="recaptcha_response" id="recaptchaResponse">
	<input type="hidden" name="page" value="<?php echo $post->post_title; ?>" />
</form>