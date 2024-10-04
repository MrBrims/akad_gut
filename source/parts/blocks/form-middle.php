<h2 class="title form-middle__title">
	Für Fragen und Unterstützung benutzen Sie bitte das untenstehende Kontaktformular.
</h2>
<p class="form-middle__subtitle">
	Wir werden uns in Kürze mit Ihnen in Verbindung setzen.
</p>
<form class="form-main form">
	<div class="form-main__items form__items">
		<div class="form-main__item form__item-middle">
			<span class="form__text">
				Name
			</span>
			<input class="form-main__input input" name="name" type="text" placeholder="Name">
		</div>
		<div class="form-main__item form__item-middle">
			<span class="form__text">
				<span class="form__required-field">*</span> E-Mail <span class="form__tippy " data-tippy-content="Bitte geben Sie Ihre echte E-Mail-Adresse an, damit wir die höchste Qualität Ihrer Arbeit sicherstellen können."></span>
			</span>
			<input class="form-main__input input" name="email" type="email" placeholder="E-Mail..." required>
		</div>
		<div class="form-main__item form__item-full">
			<div class="form-main__item-box">
				<span class="form__text">
					Kommentieren <span class="form__tippy" data-tippy-content="Das ist Thema Ihrer Arbeit. Das ist sehr wichtig, Ihr Thema jetzt richtig zu schreiben."></span>
				</span>
				<textarea class="form-main__input form-main__terxtarea form-main__komment input" name="kommentieren" placeholder="Kommentieren"></textarea>
			</div>
		</div>
		<div class="form-main__item form__item-middle">
			<span class="form__text">File <span class="form__tippy" data-tippy-content="ZIP, DOCX oder PDF (&lt;50mb)"></span></span>
			<label class="form__file-custom form-main__input input">
				<input name="file" type="file">
				<span>File</span>
			</label>
		</div>
	</div>
	<input class="form-main__btn btn" type="submit" value="DAS FORMULAR abschicken">
	<p class="form-main__text-protect">
		Die Hinweise aus der <span>Datenschutzerklärung</span> und den <span>AGB</span> habe ich gelesen und akzeptiere diese.
	</p>

	<input type="hidden" name="form-id" value="middle-form">
	<input type="hidden" name="coaching_condition" value="<?php echo Helpers::coach_cond(); ?>">
	<input type="hidden" name="page_link" value="<?php echo get_permalink(); ?>">
	<input type="hidden" name="recaptcha_response" id="recaptchaResponse">
	<input type="hidden" name="page" value="<?php echo $post->post_title; ?>" />
</form>