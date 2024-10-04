<form action="" class="form form-litle form-coach">
	<div class="form-litle__items">
		<div class="form-litle__item form-litle__item-full">
			<span class="form__text">
				<span class="form__required-field">*</span> Arbeitstyp <span class="form__tippy" data-tippy-content="Wenn Sie Ihren Arbeitstyp nicht in der Liste gefunden haben, wählen Sie 'Sonstige Arbeit' aus."></span>
			</span>
			<?php echo get_template_part('parts/blocks/type-select') ?>
		</div>
		<div class="form-litle__item form-litle__item-full">
			<span class="form__text">Dateien anhängen <span class="form__tippy" data-tippy-content="Hängen Sie Ihre Dateien an, falls sie vorhaden sind."></span></span>
			<label class="form__file-custom form-litle__input input">
				<input name="file" type="file">
				<span>ZIP, DOCK oder PDF (&lt;50mb)</span>
			</label>
		</div>
		<div class="form-litle__item">
			<span class="form__text">
				<span class="form__required-field">*</span> E-Mail <span class="form__tippy " data-tippy-content="Bitte geben Sie Ihre echte E-Mail-Adresse an. Vor dem Absenden der Anfrage überprüfen Sie bitte die angegebene E-Mail-Adresse noch einmal."></span>
			</span>
			<input class="form-litle__input input" name="email" type="email" placeholder="E-Mail..." required>
		</div>
		<div class="form-litle__item">
			<span class="form__text">
				Phone <span class="form__tippy" data-tippy-content="Erfahrungsgemäß lassen sich viele Fragen am besten telefonisch klären. Falls Sie einen Rückruf wünschen, geben Sie bitte Ihre Telefonummer an."></span>
			</span>
			<label class="form-litle__label-tel">
				<input class="form-litle__input phone-input input" name="phone" type="tel" placeholder="WhatsApp">
			</label>
		</div>
		<label class="form-litle__check-inner">
			<input class="custom-checkbox" type="checkbox" name="Kontakt nur über WhatsApp">
			<span class="style-checkbox"></span>
			<span class="form-litle__check-text">Kontakt nur über WhatsApp</span>
		</label>
		<p class="form-litle__protect-text">
			Ihre Daten werden streng vertraulich behandelt und nicht an Dritte weitergegeben.
		</p>
	</div>
	<input class="form__btn btn" type="submit" value="UNVERBINDLICH ANFRAGEN">

	<input type="hidden" name="form-id" value="hero-form">
	<input type="hidden" name="coaching_condition" value="<?php echo Helpers::coach_cond(); ?>">
	<input type="hidden" name="page_link" value="<?php echo get_permalink(); ?>">
	<input type="hidden" name="recaptcha_response" id="recaptchaResponse">
	<input type="hidden" name="page" value="<?php echo $post->post_title; ?>" />
</form>