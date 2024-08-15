<form class="form-main form">
	<div class="form-main__items form__items">
		<div class="form-main__item form__item-middle">
			<div class="form-main__item-box">
				<span class="form__text">
					<span class="form__required-field">*</span> Arbeitstyp <span class="form__tippy" data-tippy-content="Auf dieser Seite gibt es keine Möglichkeit, einen anderen Arbeitstyp auszuwählen. Wenn Sie eine andere Art der Arbeit benötigen, gehen Sie bitte zur Hauptseite."></span>
				</span>
				<input class="form-litle__input input" name="type" type="text" value="Online-Klausur" required readonly>
			</div>
			<span class="form__text">
				<span class="form__required-field">*</span> Fachrichtung <span class="form__tippy" data-tippy-content="Wählen Sie bitte die Fachrichtung Ihrer Klausur aus. Wenn keine Fachrichtung passend ist, wählen Sie 'Andere' aus."></span>
			</span>
			<?php echo get_template_part('parts/blocks/fach-select') ?>
		</div>
		<div class="form-main__item form__item-middle">
			<span class="form__text">
				Thema <span class="form__tippy" data-tippy-content="Geben Sie bitte das Thema Ihrer Klausur an."></span>
			</span>
			<textarea class="form-main__input form-main__terxtarea form-main__theme input" name="theme" placeholder="Geben Sie bitte das Thema Ihrer Klausur an."></textarea>
		</div>
		<div class="form-main__item form__item-little">
			<span class="form__text">
				Format <span class="form__tippy" data-tippy-content="Wählen Sie bitte das Format Ihrer Klausur aus."></span>
			</span>
			<?php echo get_template_part('parts/blocks/format-select') ?>
		</div>
		<div class="form-main__item form__item-little">
			<span class="form__text">
				Qualität <span class="form__tippy" data-tippy-content="Wenn der akademische Grad des Experten für Sie wichtig ist, wählen Sie bitte einen aus."></span>
			</span>
			<?php echo get_template_part('parts/blocks/qualitat-select') ?>
		</div>
		<div class="form-main__item form__item-little">
			<span class="form__text">
				Startzeit <span class="form__tippy" data-tippy-content="Geben Sie bitte an, um wie viel Uhr Ihre Klausur beginnt."></span>
			</span>
			<label class="form__time-custom">
				<input class="form-main__input input" type="time" name="startzeit" />
			</label>
		</div>
		<div class="form-main__item form__item-little">
			<span class="form__text">
				<span class="form__required-field">*</span> Prüfungsdauer (mind. 30 Min.) <span class="form__tippy" data-tippy-content="Geben Sie bitte an, wie lange Ihre Klausur dauert."></span>
			</span>
			<div class="form-counter">
				<div data-id="decrement" class="counter-btn">-</div>
				<input class="count-input input" name="number" type="number" value="30" max="1000" min="0" step="30" />
				<div data-id="increment" class="counter-btn">+</div>
			</div>
		</div>
		<div class="form-main__item form__item-little">
			<span class="form__text">
				<span class="form__required-field">*</span> Datum <span class="form__tippy" data-tippy-content="Geben Sie bitte das Datum an, wann Ihre Klausur stattfindet."></span>
			</span>
			<label class="form__date-custom">
				<input class="form-main__input date-input input" name="deadline" type="text" placeholder="<?php echo date("d.m.Y"); ?>" onfocus="(this.value='<?php echo date('d.m.Y'); ?>')" readonly required>
			</label>
		</div>
		<div class="form-main__item form__item-little">
			<span class="form__text">
				Promocode <span class="form__tippy" data-tippy-content="Bitte geben Sie den Promocode an, wenn Sie einen haben."></span>
			</span>
			<input class="form-main__input input" name="promocode" type="text" placeholder="Promocode">
		</div>
		<div class="form-main__item form__item-middle">
			<span class="form__text">
				Name <span class="form__tippy" data-tippy-content="Geben Sie bitte Ihren Namen an, damit wir wissen, wie wir Sie ansprechen können."></span>
			</span>
			<input class="form-main__input input" name="name" type="text" placeholder="Name">
		</div>
		<div class="form-main__item form__item-middle">
			<span class="form__text">
				<span class="form__required-field">*</span> E-Mail <span class="form__tippy " data-tippy-content="Bitte geben Sie Ihre echte E-Mail-Adresse an. Vor dem Absenden überprüfen Sie bitte die angegebene E-Mail-Adresse noch einmal."></span>
			</span>
			<input class="form-main__input input" name="email" type="email" placeholder="E-Mail..." required>
		</div>
		<div class="form-main__item form__item-middle">
			<span class="form__text">
				<span class="form__required-field">*</span> Phone <span class="form__tippy" data-tippy-content="Erfahrungsgemäß lassen sich viele Fragen am besten telefonisch klären. Falls Sie einen Rückruf wünschen, geben Sie bitte hier Ihre Telefonummer an."></span>
			</span>
			<label class="form-litle__label-tel">
				<input class="form-main__input phone-input input" name="phone" type="tel" required placeholder="WhatsApp">
			</label>
		</div>
		<div class="form-main__item form__item-middle form-main__check-inner">
			<label class="form-litle__check-inner form-main__check">
				<input class="custom-checkbox" type="checkbox" name="Kontakt nur über WhatsApp">
				<span class="style-checkbox"></span>
				<span class="form-litle__check-text">Kontakt nur über WhatsApp</span>
			</label>
		</div>
		<div class="form-main__item form__item-full">
			<span class="form__text">Dateien anhängen <svg width="8" height="8" fill="none" xmlns="http://www.w3.org/2000/svg">
					<g clip-path="url(#a)">
						<path d="M4 6 0 2h2l2 2 2-2h2L4 6Z" fill="#002e5d" />
					</g>
					<defs>
						<clipPath id="a">
							<path fill="#002e5d" d="M0 0h8v8H0z" />
						</clipPath>
					</defs>
				</svg><span class="form__tippy" data-tippy-content="Probeklausuren hochladen, falls vorhanden."></span></span>
			<label class="form__file-custom-big form-main__input">
				<input name="file" type="file">
				<span class="form__file-place">ZIP, DOCX oder PDF (<50mb) </span>
			</label>
		</div>
	</div>
	<p class="form-main__protect-title form-main__coaching-protect">
		Ihre Anfrage ist unverbindlich.<br>
		Ihre Daten werden streng vertraulich behandelt und nicht an Dritte weitergegeben.
	</p>
	<p class="form-main__text-protect">
		<label class="form-litle__check-inner form-main__check">
			<input class="custom-checkbox" type="checkbox" name="on-wapp" checked>
			<span class="style-checkbox"></span>
			<span class="form-litle__check-text">Die Hinweise aus der <a href="https://akademily.de/datenschutz/" target="_blank">Datenschutzerklärung</a> und den <a href="https://akademily.de/agb/" target="_blank">AGB</a> habe ich gelesen und akzeptiere diese.</span>
		</label>
	</p>
	<input class="form-main__btn btn" type="submit" value="JETZT ANFRAGEN">
	<input type="hidden" name="form-id" value="big-form">
	<input type="hidden" name="coaching_condition" value="<?php echo Helpers::coach_cond(); ?>">
	<input type="hidden" name="page_link" value="<?php echo get_permalink(); ?>">
	<input type="hidden" name="recaptcha_response" id="recaptchaResponse">
	<input type="hidden" name="page" value="<?php echo $post->post_title; ?>" />
</form>