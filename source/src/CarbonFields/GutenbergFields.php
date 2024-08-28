<?php

use Carbon_Fields\Block;
use Carbon_Fields\Field;

class GutenbergFields
{
	public function __construct()
	{
		add_action('carbon_fields_register_fields', [$this, 'gutenbergTeam']);
		add_action('carbon_fields_register_fields', [$this, 'gutenbergQulifikation']);
		add_action('carbon_fields_register_fields', [$this, 'gutenbergGuarant']);
		add_action('carbon_fields_register_fields', [$this, 'gutenbergHowWork']);
		add_action('carbon_fields_register_fields', [$this, 'gutenbergTabPrice']);
		add_action('carbon_fields_register_fields', [$this, 'gutenbergBigForm']);
		add_action('carbon_fields_register_fields', [$this, 'gutenbergReviews']);
		add_action('carbon_fields_register_fields', [$this, 'gutenbergBtnWhats']);
		add_action('carbon_fields_register_fields', [$this, 'gutenbergStatistic']);
		add_action('carbon_fields_register_fields', [$this, 'gutenbergRedBtn']);
		add_action('carbon_fields_register_fields', [$this, 'gutenbergTable']);
		add_action('carbon_fields_register_fields', [$this, 'gutenbergTrust']);
		add_action('carbon_fields_register_fields', [$this, 'gutenbergRating']);
		add_action('carbon_fields_register_fields', [$this, 'gutenbergFormCalc']);
		add_action('carbon_fields_register_fields', [$this, 'lektoratPriceTable']);
		add_action('carbon_fields_register_fields', [$this, 'guarantPercent']);
		add_action('carbon_fields_register_fields', [$this, 'teamMp']);
		add_action('carbon_fields_register_fields', [$this, 'teamMo']);
		add_action('carbon_fields_register_fields', [$this, 'teamMa']);
		add_action('carbon_fields_register_fields', [$this, 'teamDev']);
		add_action('carbon_fields_register_fields', [$this, 'cooperationBlock']);
		add_action('carbon_fields_register_fields', [$this, 'oldFaq']);
		add_action('carbon_fields_register_fields', [$this, 'interviewBlock']);
		add_action('carbon_fields_register_fields', [$this, 'gutenbergGoals']);
		add_action('carbon_fields_register_fields', [$this, 'contactImpressum']);
		add_action('carbon_fields_register_fields', [$this, 'gutenbergMap']);
		add_action('carbon_fields_register_fields', [$this, 'gutenbergEdulab']);
		add_action('carbon_fields_register_fields', [$this, 'impressumForm']);
		add_action('carbon_fields_register_fields', [$this, 'impressumSocial']);
		add_action('carbon_fields_register_fields', [$this, 'gutenbergSteps']);
		add_action('carbon_fields_register_fields', [$this, 'newGuarant']);
		add_action('carbon_fields_register_fields', [$this, 'sidebarGuarant']);
	}

	public function gutenbergTeam()
	{
		Block::make(__('Manager slider'))
			->add_fields(array(
				Field::make('complex', 'team_card', __('Слайдер'))
					->set_layout('tabbed-horizontal')
					->setup_labels(['singular_name' => 'менеджера'])
					->add_fields([
						Field::make('image', 'team_card_img', __('Фото'))
							->set_type('image')
							->set_value_type('url'),
						Field::make('text', 'team_card_name', __('Имя'))
							->set_width(50),
						Field::make('text', 'team_card_position', __('Должность'))
							->set_width(50),
						Field::make('text', 'team_card_tel', __('WhatsApp'))
							->set_width(30),
						Field::make('text', 'team_card_mail', __('Почта'))
							->set_width(30),
						Field::make('text', 'team_card_time', __('Время работы'))
							->set_width(30),
					])
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
?>

			<div class="team-vidget">
				<div class="sticky-block">
					<div class="team">
						<h3 class="team__title">
							Unsere Kundenbetreuer
						</h3>
						<div class="team__body swiper">
							<div class="team__wrapper swiper-wrapper">
								<?php foreach ($fields['team_card'] as $key) : ?>
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
			</div>

		<?php
			});
	}

	public function gutenbergQulifikation()
	{
		Block::make(__('Qualifikation'))
			->add_fields(array(
				Field::make('complex', 'qualification_card', __('Карточки'))
					->set_layout('tabbed-horizontal')
					->setup_labels(['singular_name' => 'карточку'])
					->add_fields([
						Field::make('image', 'qualification_card_img', __('Иконка'))
							->set_width(20)
							->set_type('image')
							->set_value_type('url'),
						Field::make('textarea', 'qualification_card_title', __('Текст на карточке'))
							->set_width(40)
							->set_rows(3),
						Field::make('textarea', 'qualification_card_quest', __('Подсказка'))
							->set_width(40)
							->set_rows(3),
					])
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>
			<div class="qualification">
				<div class="qualification__items">
					<?php foreach ($fields['qualification_card'] as $key) : ?>
						<div class="qualification__item">
							<img class="qualification__item-icons" src="<?php echo $key['qualification_card_img']; ?>" alt="<?php Helpers::imageAlt($key['qualification_card_img']); ?>">
							<p class="qualification__item-text">
								<?php echo $key['qualification_card_title']; ?>
							</p>
							<span class="qualification__tippy" data-tippy-content="<?php echo $key['qualification_card_quest']; ?>">i</span>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php
			});
	}

	public function gutenbergGuarant()
	{
		Block::make(__('Guarant'))
			->add_fields(array(
				Field::make('complex', 'guarant_card', __('Карточки'))
					->set_layout('tabbed-horizontal')
					->setup_labels(['singular_name' => 'карточку'])
					->add_fields([
						Field::make('text', 'guarant_card_title', __('Заголовок')),
						Field::make('text', 'guarant_card_subtitle', __('Подзаголовок')),
						Field::make('textarea', 'guarant_card_text', __('Текст'))
							->set_rows(3),
						Field::make('image', 'guarant_card_img', __('Иконка'))
							->set_type('image')
							->set_value_type('url'),
					])
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>
			<div class="guarant">
				<?php foreach ($fields['guarant_card'] as $key) : ?>
					<div class="guarant__item">
						<p class="guarant__item-title">
							<?php echo $key['guarant_card_title']; ?>
						</p>
						<p class="guarant__item-subtitle">
							<?php echo $key['guarant_card_subtitle']; ?>
						</p>
						<p class="guarant__item-text">
							<?php echo $key['guarant_card_text']; ?>
						</p>
						<img class="guarant__item-img" src="<?php echo $key['guarant_card_img']; ?>" alt="<?php Helpers::imageAlt($key['guarant_card_img']); ?>">
					</div>
				<?php endforeach; ?>
			</div>
		<?php
			});
	}

	public function gutenbergHowWork()
	{
		Block::make(__('How Work'))
			->add_fields(array(
				Field::make('complex', 'accordeon_work', __('Аккордеон Как мы работаем'))
					->set_layout('tabbed-horizontal')
					->setup_labels(['singular_name' => 'аккордеон'])
					->add_fields([
						Field::make('text', 'accordeon_work_title', __('Заголовок аккордеона')),
						Field::make('textarea', 'accordeon_work_text', __('Текст аккордеона'))
							->set_rows(3),
						Field::make('checkbox', 'accordeon_work_btn_show', __('Показать кнопку?'))
							->set_width(30),
						Field::make('text', 'accordeon_work_btn', __('Текст на кнопке'))
							->set_width(40),
						Field::make('image', 'accordeon_work_image', __('Изображение слева'))
							->set_width(30)
							->set_type('image')
							->set_value_type('url'),
					])
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>
			<div class="accordion accordion-work">
				<?php foreach ($fields['accordeon_work'] as $key) : ?>
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

		<?php
			});
	}

	public function gutenbergTabPrice()
	{
		Block::make(__('Tab Price'))
			->add_fields(array(
				Field::make('complex', 'price_tab_main', __('Прайс'))
					->set_layout('tabbed-vertical')
					->setup_labels(['singular_name' => 'контент'])
					->add_fields([
						Field::make('text', 'price_tab_name', __('Название таба'))
							->set_width(50),
						Field::make('text', 'price_tab_num', __('Цена'))
							->set_width(50),
						Field::make('textarea', 'price_tab_note', __('Подсказка к названию'))
							->set_rows(3),
					])
					->set_header_template('
				<% if (price_tab_name) { %>
					<%- price_tab_name %>
			  	<% } else { %>
					<%- "Name" %>
				<% } %>
				')
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>
			<div class="tab tab-price">
				<div class="tab__nav-inner tab-price__nav-inner">
					<?php foreach ($fields['price_tab_main'] as $key) : ?>
						<div class="tab__nav tab-price__nav">
							<?php echo $key['price_tab_name']; ?>
							<span class="tab-price__tippy " data-tippy-content="<?php echo $key['price_tab_note']; ?>"></span>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="tab__content-inner">
					<?php foreach ($fields['price_tab_main'] as $key) : ?>
						<div class="tab__content tab-price__content">
							<div class="tab-price__items">
								<div class="tab-price__item">
									<p class="tab-price__note">
										<?php echo $key['price_tab_note']; ?>
									</p>
									<div class="tab-price__num">
										ab
										<span class="tab-price__num-accent">
											<?php echo $key['price_tab_num']; ?>
											euro
										</span>
										pro Seite
									</div>
									<a class="tab-price__btn popup-link" href="#popup-form">
										anfragen
									</a>
								</div>
								<div class="tab-price__item">
									<ul>
										<li>Verfassen Ihrer Arbeit nach Ihren Wünschen und Anforderungen</li>
										<li>Möglichkeit des anonymen direkten Kontakts mit dem Autor</li>
										<li>Verfassen sowohl der ganzen Arbeit als auch einzelner Teile</li>
										<li>Unbefristete Garantie für die Korrektur der Arbeit*</li>
										<li>Inhaltsverzeichnis, Literaturverzeichnis, Abbildungsverzeichnis <strong>KOSTENLOS</strong></li>
										<li>Plagiatsprüfung <strong>KOSTENLOS</strong></li>
										<li>Überprüfung Ihrer Arbeit von einem unabhängigen Korrekturleser</li>
										<li>Überprüfung Ihrer Arbeit in der Qualitätskontrolleabteilung <strong>KOSTENLOS</strong></li>
										<li>Rechtzeitige Teillieferungen der Arbeit</li>
										<li>Möglichkeit der Teilzahlung ohne Zusatzkosten</li>
									</ul>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php
			});
	}

	public function gutenbergBigForm()
	{
		Block::make(__('Big Form'))
			->add_fields(array(
				Field::make('text', 'ak_bigform_title', __('Заголовок формы')),
				Field::make('checkbox', 'ak_bigform_check', __('Сделать поле  Thema der Arbeit обязательным?'))
					->set_width(30),
				Field::make('text', 'ak_bigform_btn_text', __('Текст на кнопке'))
					->set_default_value('JETZT ANFRAGEN')
					->set_width(30),
				Field::make('text', 'ak_bigform_siten_num', __('Количество страниц'))
					->set_default_value('5')
					->set_width(30),
				Field::make('select', 'ak_complex_global_select', 'Выбор формы')
					->add_options(
						array(
							'' => 'Выберите форму',
							'form-main-new' => 'Большая общая',
							'form-main-online' => 'Для онлайнов',
							'form-main-coach' => 'Для коачинга',
							'form-main-lekt' => 'Для лектората + общая',
						)
					)
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>
			<div class="message">
				<div class="message__container">
					<?php if (!empty($fields['ak_bigform_title'])) : ?>
						<h3 class="title message__title">
							<?php echo esc_html($fields['ak_bigform_title']); ?>
						</h3>
					<?php endif ?>
					<?php
					switch ($fields['ak_complex_global_select']) {
						case (''):
							echo 'Нужно выбрать форму в админ панели';
							break;
						case ('form-main-new'):
					?>
							<form class="form-main form">
								<div class="form-main__items form__items">
									<div class="form-main__item form__item-middle">
										<div class="form-main__item-box">
											<span class="form__text">
												<span class="form__required-field">*</span> Arbeitstyp <span class="form__tippy" data-tippy-content="Wenn Sie Ihren Arbeitstyp nicht in der Liste gefunden haben, wählen Sie 'Sonstige Arbeit' aus."></span>
											</span>
											<?php echo get_template_part('parts/blocks/type-select') ?>
										</div>
										<span class="form__text">
											<span class="form__required-field">*</span> Fachrichtung <span class="form__tippy" data-tippy-content="Wählen Sie bitte die Fachrichtung Ihrer Arbeit aus. Wenn keine Fachrichtung passend ist, wählen Sie „Andere Fachrichtung” Je mehrere Informationen Sie eingeben, desto besser."></span>
										</span>
										<?php echo get_template_part('parts/blocks/fach-select') ?>
									</div>
									<div class="form-main__item form__item-middle">
										<span class="form__text">
											<span class="form__required-field">*</span> Thema der Arbeit <span class="form__tippy" data-tippy-content="Das ist das Thema Ihrer Arbeit. Es ist sehr wichtig, Ihr Thema jetzt richtig zu schreiben."></span>
										</span>
										<textarea class="form-main__input form-main__terxtarea form-main__theme input" name="theme" placeholder="Thema der Arbeit..." required></textarea>
									</div>
									<div class="form-main__item form__item-middle">
										<span class="form__text">
											Zitierweise
										</span>
										<?php echo get_template_part('parts/blocks/zittirweise-select') ?>
									</div>
									<div class="form-main__item form__item-middle">
										<span class="form__text">
											Qualität <span class="form__tippy" data-tippy-content="Ist Ihnen der wissenschaftliche Grad des Autors wichtig, der Ihre Arbeit schreiben wird?"></span>
										</span>
										<?php echo get_template_part('parts/blocks/qualitat-select') ?>
									</div>
									<div class="form-main__item form__item-little">
										<span class="form__text">
											<span class="form__required-field">*</span> Seitenanzahl
										</span>
										<div class="form-counter">
											<div data-id="decrement" class="counter-btn">-</div>
											<input class="count-input input" name="number" type="number" value="30" max="1000" min="0" step="1" />
											<div data-id="increment" class="counter-btn">+</div>
										</div>
									</div>
									<div class="form-main__item form__item-little">
										<span class="form__text">
											<span class="form__required-field">*</span> Liefertermin
										</span>
										<label class="form__date-custom">
											<input class="form-main__input date-input input" name="deadline" type="text" placeholder="<?php echo date("d.m.Y"); ?>" onfocus="(this.value='<?php echo date('d.m.Y'); ?>')" readonly required>
										</label>
									</div>
									<div class="form-main__item form__item-little">
										<span class="form__text">
											Promocode
										</span>
										<input class="form-main__input input" name="promocode" type="text" placeholder="Promocode">
									</div>
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
									<div class="form-main__item form__item-middle">
										<span class="form__text">
											<span class="form__required-field">*</span> Phone <span class="form__tippy" data-tippy-content="Erfahrungsgemäß lassen sich viele Fragen am besten telefonisch klären. Falls Sie einen Rückruf wünschen, geben Sie bitte hier Ihre Telefonummer an"></span>
										</span>
										<label class="form-litle__label-tel">
											<input class="form-main__input phone-input input" name="phone" type="tel" required placeholder="WhatsApp">
										</label>
									</div>
									<div class="form-main__item form__item-middle">
										<span class="form__text">
											Ihre Verfügbarkeit
										</span>
										<?php echo get_template_part('parts/blocks/ihre-select') ?>
									</div>
									<div class="form-main__item form__item-middle">
										<span class="form__text">File <span class="form__tippy" data-tippy-content="ZIP, DOCX oder PDF (&lt;50mb)"></span></span>
										<label class="form__file-custom form-main__input input">
											<input name="file" type="file">
											<span>File</span>
										</label>
									</div>
								</div>
								<p class="form-main__protect-title form-main__coaching-protect">
									Ihre Anfrage ist unverbindlich.<br>
									Ihre Daten werden streng vertraulich behandelt und nicht an Dritte weitergegeben.
								</p>
								<p class="form-main__text-protect">
									<label class="form-litle__check-inner form-main__check">
										<input class="custom-checkbox" type="checkbox" name="Kontakt nur über WhatsApp" checked>
										<span class="style-checkbox"></span>
										<span class="form-litle__check-text">Die Hinweise aus der <a href="https://akademily.de/datenschutz/" target="_blank">Datenschutzerklärung</a> und den <a href="https://akademily.de/agb/" target="_blank" title="Datenschutzerklärung">AGB</a> habe ich gelesen und akzeptiere diese.</span>
									</label>
								</p>
								<input class="form-main__btn btn" type="submit" value="DAS FORMULAR abschicken">
								<input type="hidden" name="form-id" value="big-form">
								<input type="hidden" name="page_link" value="<?php echo get_permalink(); ?>">
								<input type="hidden" name="recaptcha_response" id="recaptchaResponse">
								<input type="hidden" name="page" value="<?php the_title(); ?>" />
							</form>
						<?php
							break;
						case ('form-main-online'):
						?>
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
										<input class="custom-checkbox" type="checkbox" name="Kontakt nur über WhatsApp" checked>
										<span class="style-checkbox"></span>
										<span class="form-litle__check-text">Die Hinweise aus der <a href="https://akademily.de/datenschutz/" target="_blank">Datenschutzerklärung</a> und den <a href="https://akademily.de/agb/" target="_blank" title="Datenschutzerklärung">AGB</a> habe ich gelesen und akzeptiere diese.</span>
									</label>
								</p>
								<input class="form-main__btn btn" type="submit" value="JETZT ANFRAGEN">
								<input type="hidden" name="form_type" value="big-form">
								<input type="hidden" name="page_link" value="<?php echo get_permalink(); ?>">
								<input type="hidden" name="recaptcha_response" id="recaptchaResponse">
								<input type="hidden" name="page" value="<?php the_title(); ?>" />
							</form>
						<?php
							break;
						case ('form-main-coach'):
						?>
							<form class="form-main form">
								<div class="form-main__items form__items">
									<div class="form-main__item form__item-middle">
										<div class="form-main__item-box">
											<span class="form__text">
												<span class="form__required-field">*</span> Arbeitstyp <span class="form__tippy" data-tippy-content="Wenn Sie Ihren Arbeitstyp nicht in der Liste gefunden haben, wählen Sie 'Sonstige Arbeit' aus."></span>
											</span>
											<?php echo get_template_part('parts/blocks/type-select') ?>
										</div>
										<span class="form__text">
											<span class="form__required-field">*</span> Fachrichtung <span class="form__tippy" data-tippy-content="Wählen Sie bitte die Fachrichtung Ihrer Arbeit aus. Wenn keine Fachrichtung passend ist, wählen Sie 'Andere' aus."></span>
										</span>
										<?php echo get_template_part('parts/blocks/fach-select') ?>
									</div>
									<div class="form-main__item form__item-middle">
										<span class="form__text">
											<?php if (!empty($fields['ak_bigform_check'])) { ?>
												<span class="form__required-field">*</span>
												<?php
												$requiredForm = 'required';
												$placeThem = 'Wenn Ihr Thema offen steht, geben Sie -';
												?>
											<?php } else {
												$requiredForm = '';
												$placeThem = 'Thema der Arbeit...';
											} ?>
											Thema der Arbeit <span class="form__tippy" data-tippy-content="Geben Sie bitte das Thema Ihrer Arbeit an. Wenn das Thema noch offen ist, können Sie das Feld leer lassen."></span>
										</span>
										<textarea class="form-main__input form-main__terxtarea form-main__theme input" name="theme" placeholder="<?php echo $placeThem ?>" <?php echo $requiredForm ?>></textarea>
									</div>
									<div class="form-main__item form__item-middle">
										<span class="form__text">
											Name <span class="form__tippy" data-tippy-content="Geben Sie bitte Ihren Namen an, damit wir wissen, wie wir Sie ansprechen können."></span>
										</span>
										<input class="form-main__input input" name="name" type="text" placeholder="Name">
									</div>
									<div class="form-main__item form__item-middle">
										<span class="form__text">
											<span class="form__required-field">*</span> E-Mail <span class="form__tippy " data-tippy-content="Bitte geben Sie Ihre echte E-Mail-Adresse an. Vor dem Absenden der Anfrage überprüfen Sie bitte die angegebene E-Mail-Adresse noch einmal."></span>
										</span>
										<input class="form-main__input input" name="email" type="email" placeholder="E-Mail..." required>
									</div>
									<div class="form-main__item form__item-middle">
										<span class="form__text">
											<span class="form__required-field">*</span> Phone <span class="form__tippy" data-tippy-content="Erfahrungsgemäß lassen sich viele Fragen am besten telefonisch klären. Falls Sie einen Rückruf wünschen, geben Sie bitte Ihre Telefonummer an."></span>
										</span>
										<label class="form-litle__label-tel">
											<input class="form-main__input phone-input input" name="phone" type="tel" required placeholder="WhatsApp">
										</label>
									</div>
									<div class="form-main__item form__item-middle form-main__check-inner">
										<label class="form-litle__check-inner form-main__check">
											<input class="custom-checkbox" type="checkbox" name="Kontakt nur über WhatsApp" checked>
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
											</svg><span class="form__tippy" data-tippy-content="Hängen Sie Ihre Dateien an, falls sie vorhaden sind."></span></span>
										<label class="form__file-custom-big form-main__input">
											<input name="file" type="file">
											<span class="form__file-place">ZIP, DOCX oder PDF (<50mb) </span>
										</label>
									</div>
									<div class="form-main__item form__item-middle">
										<span class="form__text">
											Promocode <span class="form__tippy" data-tippy-content="Bitte geben Sie den Promocode an, wenn Sie einen haben."></span>
										</span>
										<input class="form-main__input input" name="promocode" type="text" placeholder="Promocode">
									</div>
									<div class="form-main__item form__item-middle">
										<input class="form-main__btn-coach btn" type="submit" value="JETZT ANFRAGEN">
									</div>
								</div>

								<p class="form-main__protect-title form-main__coaching-protect">
									Ihre Anfrage ist unverbindlich.<br>
									Ihre Daten werden streng vertraulich behandelt und nicht an Dritte weitergegeben.
								</p>
								<p class="form-main__text-protect">
									<label class="form-litle__check-inner form-main__check">
										<input class="custom-checkbox" type="checkbox" name="Kontakt nur über WhatsApp" checked>
										<span class="style-checkbox"></span>
										<span class="form-litle__check-text">Die Hinweise aus der <a href="https://akademily.de/datenschutz/" target="_blank">Datenschutzerklärung</a> und den <a href="https://akademily.de/agb/" target="_blank" title="Datenschutzerklärung">AGB</a> habe ich gelesen und akzeptiere diese.</span>
									</label>
								</p>
								<input type="hidden" name="form_type" value="big-form">
								<input type="hidden" name="page_link" value="<?php echo get_permalink(); ?>">
								<input type="hidden" name="recaptcha_response" id="recaptchaResponse">
								<input type="hidden" name="page" value="<?php the_title(); ?>" />
							</form>
						<?php
							break;
						case ('form-main-lekt'):
						?>
							<form class="form-main form">
								<div class="form-main__items form__items">
									<div class="form-main__item form__item-middle">
										<div class="form-main__item-box">
											<span class="form__text">
												<span class="form__required-field">*</span> Arbeitstyp <span class="form__tippy" data-tippy-content="Wenn Sie Ihren Arbeitstyp nicht in der Liste gefunden haben, wählen Sie 'Sonstige Arbeit' aus."></span>
											</span>
											<?php echo get_template_part('parts/blocks/type-select') ?>
										</div>
										<span class="form__text">
											<span class="form__required-field">*</span> Fachrichtung <span class="form__tippy" data-tippy-content="Wählen Sie bitte die Fachrichtung Ihrer Arbeit aus. Wenn keine Fachrichtung passend ist, wählen Sie 'Andere' aus."></span>
										</span>
										<?php echo get_template_part('parts/blocks/fach-select') ?>
									</div>
									<div class="form-main__item form__item-middle">
										<span class="form__text">
											<?php if (!empty($fields['ak_bigform_check'])) { ?>
												<span class="form__required-field">*</span>
												<?php
												$requiredForm = 'required';
												$placeThem = 'Wenn Ihr Thema offen steht, geben Sie -';
												?>
											<?php } else {
												$requiredForm = '';
												$placeThem = 'Thema der Arbeit...';
											} ?>
											Thema der Arbeit <span class="form__tippy" data-tippy-content="Geben Sie bitte das Thema Ihrer Arbeit an."></span>
										</span>
										<textarea class="form-main__input form-main__terxtarea form-main__theme input" name="theme" placeholder="<?php echo $placeThem ?>" <?php echo $requiredForm ?>></textarea>
									</div>
									<div class="form-main__item form__item-middle">
										<span class="form__text">
											Zitierweise <span class="form__tippy" data-tippy-content="Geben Sie bitte die Zitierweise an."></span>
										</span>
										<?php echo get_template_part('parts/blocks/zittirweise-select') ?>
									</div>
									<div class="form-main__item form__item-middle">
										<span class="form__text">
											Qualität <span class="form__tippy" data-tippy-content="Wenn der akademische Grad des Autors für Sie wichtig ist, wählen Sie bitte einen aus."></span>
										</span>
										<?php echo get_template_part('parts/blocks/qualitat-select') ?>
									</div>
									<div class="form-main__item form__item-little">
										<span class="form__text">
											<span class="form__required-field">*</span> Seitenanzahl <span class="form__tippy" data-tippy-content="Geben Sie bitte die Anzahl der Seiten an."></span>
										</span>
										<div class="form-counter">
											<div data-id="decrement" class="counter-btn">-</div>
											<input class="count-input input" name="number" type="number" value="<?php echo $fields['ak_bigform_siten_num']; ?>" max="1000" min="0" step="1" />
											<div data-id="increment" class="counter-btn">+</div>
										</div>
									</div>
									<div class="form-main__item form__item-little">
										<span class="form__text">
											<span class="form__required-field">*</span> Liefertermin <span class="form__tippy" data-tippy-content="Geben Sie bitte an, wann Sie die Arbeit erhalten möchten."></span>
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
											</svg><span class="form__tippy" data-tippy-content="Hängen Sie Ihre Dateien an, falls sie vorhaden sind."></span></span>
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
										<input class="custom-checkbox" type="checkbox" name="Kontakt nur über WhatsApp" checked>
										<span class="style-checkbox"></span>
										<span class="form-litle__check-text">Die Hinweise aus der <a href="https://akademily.de/datenschutz/" target="_blank">Datenschutzerklärung</a> und den <a href="https://akademily.de/agb/" target="_blank" title="Datenschutzerklärung">AGB</a> habe ich gelesen und akzeptiere diese.</span>
									</label>
								</p>
								<input class="form-main__btn btn" type="submit" value="<?php echo $fields['ak_bigform_btn_text']; ?>">
								<input type="hidden" name="form-id" value="big-form">
								<input type="hidden" name="page_link" value="<?php echo get_permalink(); ?>">
								<input type="hidden" name="recaptcha_response" id="recaptchaResponse">
								<input type="hidden" name="page" value="<?php the_title(); ?>" />
							</form>
					<?php
							break;
					}
					?>
				</div>
			</div>
		<?php
			});
	}

	public function gutenbergReviews()
	{
		Block::make(__('Reviews Akad'))
			->add_fields(array(
				Field::make('complex', 'soc_reviews_coach', __('Отзывы из соц. сетей'))
					->set_width(30)
					->set_layout('tabbed-horizontal')
					->setup_labels(['singular_name' => 'Отзыв'])
					->add_fields([
						Field::make('image', 'soc_reviews_img', __('Картинка'))
							->set_type('image')
							->set_value_type('url'),
					]),
				Field::make('complex', 'resp_rev', __('Отзывы с отзовиков'))
					->set_layout('tabbed-horizontal')
					->setup_labels(['singular_name' => 'Отзыв'])
					->add_fields([
						Field::make('text', 'resp_rev_title', __('Название отзовика'))
							->set_width(30),
						Field::make('text', 'resp_rev_link', __('Ссылка на отзовик'))
							->set_width(30),
						Field::make('text', 'resp_rev_star', __('Оценка'))
							->set_width(30),
						Field::make('rich_text', 'resp_rev_text', __('Отзыв')),
						Field::make('text', 'resp_rev_name', __('Имя'))
							->set_width(50),
						Field::make('text', 'resp_rev_date', __('Дата'))
							->set_width(50),
					])
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>
			<div class="section reviews">
				<div class="container">
					<div class="soc-rev">
						<div class="soc-rev__body swiper">
							<div class="soc-rev__wrapper swiper-wrapper">
								<?php foreach ($fields['soc_reviews_coach'] as $key) : ?>
									<div class="soc-rev__slide swiper-slide">
										<a class="soc-rev__slide-link" href="<?php echo $key['soc_reviews_img']; ?>" data-fancybox="gallery">
											<img class="soc-rev__slide-img" src="<?php echo $key['soc_reviews_img']; ?>" alt="<?php Helpers::imageAlt($key['soc_reviews_img']); ?>">
										</a>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>

					<div class="resp-rev">
						<div class="resp-rev__body swiper">
							<div class="resp-rev__slider swiper-wrapper">
								<?php foreach ($fields['resp_rev'] as $key) : ?>
									<div class="resp-rev__slide swiper-slide">
										<div class="resp-rev__inner">
											<a class="resp-rev__link" target="_blank" href="<?php echo $key['resp_rev_link']; ?>" rel="noopener noreferrer nofollow">
												<?php echo $key['resp_rev_title']; ?>
											</a>
											<div class="resp-rev__star-box">
												<?php
												$rating = floatval($key['resp_rev_star']) * 2;
												$stars = intdiv($rating, 2);

												for ($i = 0; $i < $stars; $i++) {
													echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="rgba(255,189,0,1)"></path></svg>';
												}

												if ($rating % 2 != 0) {
													echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"><path d="M12.0006 15.968L16.2473 18.3451L15.2988 13.5717L18.8719 10.2674L14.039 9.69434L12.0006 5.27502V15.968ZM12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="rgba(255,189,0,1)"></path></svg>';
												}
												?>
											</div>
											<div class="resp-rev__text">
												<?php echo apply_filters('the_content', $key['resp_rev_text']); ?>
											</div>
											<div class="resp-rev__footer">
												<span class="resp-rev__name">
													<?php echo $key['resp_rev_name']; ?>
												</span>
												<span class="resp-rev__date">
													<?php echo $key['resp_rev_date']; ?>
												</span>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
			});
	}

	public function gutenbergBtnWhats()
	{
		Block::make(__('Btn WhatsApp'))
			->add_fields(array(
				Field::make('text', 'heading_whats', __('Текст на кнопке WhatsApp'))
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>
			<a class="contact__btn js-wapp" target="_blank" href="https://wa.me/<?php echo preg_replace('/[^,.0-9]/', '', Helpers::num_whats()); ?>">
				<?php echo esc_html($fields['heading_whats']); ?>
			</a>
		<?php
			});
	}

	public function gutenbergStatistic()
	{
		Block::make(__('Statistic block'))
			->add_fields(array(
				Field::make('complex', 'statistic_card', __('Карточки статистики'))
					->set_layout('tabbed-horizontal')
					->setup_labels(['singular_name' => 'карточку'])
					->add_fields([
						Field::make('image', 'statistic_image', __('Картинка'))
							->set_type('image')
							->set_value_type('url'),
						Field::make('text', 'statistic_num', __('Число статистики')),
						Field::make('text', 'statistic_title', __('Заголовок статистики')),
						Field::make('rich_text', 'statistic_text', __('Текст статистики')),
					])
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>
			<div class="statistic">
				<div class="statistic__items">
					<?php foreach ($fields['statistic_card'] as $key) : ?>
						<div class="statistic__item">
							<img class="statistic__img" src="<?php echo $key['statistic_image']; ?>" alt="<?php Helpers::imageAlt($key['statistic_image']); ?>">
							<span class="statistic__num">
								<?php echo $key['statistic_num']; ?>
							</span>
							<h3 class="statistic__title">
								<?php echo $key['statistic_title']; ?>
							</h3>
							<p class="statistic__text show-less">
								<?php echo $key['statistic_text']; ?>
							</p>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php
			});
	}

	public function gutenbergRedBtn()
	{
		Block::make(__('Red Btn'))
			->add_fields(array(
				Field::make('text', 'relax_btn', __('Текст на кнопке')),
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>
			<a class="btn relax__btn popup-link" href="#popup-form">
				<?php echo $fields['relax_btn']; ?>
			</a>
		<?php
			});
	}

	public function gutenbergTable()
	{
		Block::make(__('Table Block'))
			->add_fields(array(
				Field::make('text', 'get_ak_complex_table_price_title', __('Заголовок в шапке таблицы')),
				Field::make('complex', 'get_ak_complex_table_price', __('Строка в таблице'))
					->set_layout('tabbed-horizontal')
					->setup_labels(['singular_name' => 'Строку'])
					->add_fields([
						Field::make('text', 'get_ak_complex_table_price_td', __('Текст в строке'))
					]),
				Field::make('text', 'get_ak_complex_table_price_num', __('Цена'))
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>
			<table class="table-prise">
				<thead>
					<tr>
						<th><?php echo $fields['get_ak_complex_table_price_title'] ?></th>
						<th>Preis</th>
					</tr>
				</thead>
				<tbody>
					<?php if (!empty($fields['get_ak_complex_table_price'])) : ?>
						<?php
						$first = true;
						$num_array = count($fields['get_ak_complex_table_price']);
						foreach ($fields['get_ak_complex_table_price'] as $k) :
						?>
							<tr>
								<td><?php echo $k['get_ak_complex_table_price_td'] ?></td>
								<?php if ($first) : ?>
									<td rowspan="<?php echo $num_array ?>">
										<span class="table-prise__num">ab <?php echo $fields['get_ak_complex_table_price_num'] ?> Euro</span>
										<span class="table-prise__time">(30 Min.)</span>
										<a class="table-prise__btn btn popup-link" href="#popup-form">
											Jetzt anfragen
										</a>
									</td>
								<?php
									$first = false;
								endif;
								?>
							</tr>
					<?php
						endforeach;
					endif;
					?>
				</tbody>
			</table>
		<?php
			});
	}

	public function gutenbergTrust()
	{
		Block::make(__('Trust Block'))
			->add_fields(array(
				Field::make('image', 'ak_gut_trust_img', __('Картинка'))
					->set_type('image')
					->set_value_type('url')
					->set_width(50),
				Field::make('text', 'ak_gut_trust_text_quest', __('Вопрос'))
					->set_width(50),
				Field::make('text', 'ak_gut_trust_text', __('Текст после вопроса'))
					->set_width(50),
				Field::make('text', 'ak_gut_trust_text_btn', __('Текст на кнопке'))
					->set_width(50)
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>

			<div class="banner-content">
				<div class="banner-content__img"><img src="<?php echo $fields['ak_gut_trust_img']; ?>" alt="<?php Helpers::imageAlt($fields['ak_gut_trust_img']); ?>"></div>
				<div class="banner-content__text">
					<div class="banner-content__title"><?php echo $fields['ak_gut_trust_text_quest'] ?></div>
					<p><?php echo $fields['ak_gut_trust_text'] ?></p>
				</div>
				<div class="banner-content__btn"><a class="btn popup-link" href="#popup-form">
						<?php echo $fields['ak_gut_trust_text_btn'] ?>
					</a></div>
			</div>

		<?php
			});
	}

	public function gutenbergRating()
	{
		Block::make(__('Rating Block'))
			->add_fields(array(
				Field::make('text', 'ak_gut_rate_btn_text', __('Текст на кнопке'))
					->set_default_value('JETZT KOSTENLOSES ANGEBOT ANFORDERN')
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>
			<section class="estimate">
				<div class="container">
					<div class="estimate__items">
						<img class="estimate__item" src="<?php echo get_template_directory_uri() ?>/resources/images/estimate/estimate-1.webp" alt="estimate one">
						<img class="estimate__item" src="<?php echo get_template_directory_uri() ?>/resources/images/estimate/estimate-2.webp" alt="estimate two">
						<img class="estimate__item" src="<?php echo get_template_directory_uri() ?>/resources/images/estimate/estimate-3.webp" alt="estimate three">
					</div>
					<a class="popup-link estimate__btn btn" href="#popup-form"><?php echo $fields['ak_gut_rate_btn_text'] ?></a>
				</div>
			</section>
		<?php
			});
	}

	public function gutenbergFormCalc()
	{
		Block::make(__('Price Calc Block'))
			->add_fields(array(
				Field::make('text', 'ak_complex_form_calc_title', __('Заголовок формы')),
				Field::make('text', 'ak_complex_form_calc_help', __('Услуги'))
					->set_width(30),
				Field::make('text', 'ak_complex_form_calc_help_text', __('Текст подсказки'))
					->set_width(70),
				Field::make('text', 'ak_complex_form_calc_serv_one', __('Название первой услуги')),
				Field::make('rich_text', 'ak_complex_form_calc_listone', __('Текст первой услуги')),
				Field::make('text', 'ak_complex_form_calc_serv_two', __('Название второй услуги')),
				Field::make('rich_text', 'ak_complex_form_calc_listtwo', __('Текст первой услуги')),
				Field::make('text', 'ak_complex_form_calc_conditionone', __('Название первого условия'))
					->set_width(45),
				Field::make('text', 'ak_complex_form_calc_sep', __('Разделитель'))
					->set_width(10),
				Field::make('text', 'ak_complex_form_calc_conditiontwo', __('Название второго условия'))
					->set_width(45),
				Field::make('text', 'ak_complex_form_calc_currency', __('Валюта'))
					->set_width(40),
				Field::make('text', 'ak_complex_form_calc_btn', __('Текст на кнопке'))
					->set_width(60),
				Field::make('rich_text', 'ak_complex_form_calc_right_text', __('Текст после цены')),
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>
			<div class="section form-calc">
				<div class="container">
					<div class="form-calc__inner">
						<div class="form-calc__left">
							<p class="form-calc__title">
								<?php echo $fields['ak_complex_form_calc_title'] ?>
							</p>
							<div class="form-calc__help">
								<span class="form-calc__help-name">
									<?php echo $fields['ak_complex_form_calc_help'] ?>
								</span>
								<span class="form__tippy" data-tippy-content="<?php echo $fields['ak_complex_form_calc_help_text'] ?>"></span>
							</div>
							<div class="form-calc__items">
								<div class="form-calc__item">
									<label class="form-calc__label-left">
										<input class="custom-checkbox lektorat-calc" type="radio" name="lektorat-calc" checked>
										<span class="style-checkbox"></span>
										<span class="form-calc__label-name"><?php echo $fields['ak_complex_form_calc_serv_one'] ?></span>
									</label>
									<div class="form-calc__item-content">
										<?php echo apply_filters('the_content', $fields['ak_complex_form_calc_listone']); ?>
									</div>
								</div>
								<div class="form-calc__item">
									<label class="form-calc__label-left">
										<input class="custom-checkbox korrekt-calc" type="radio" name="lektorat-calc">
										<span class="style-checkbox"></span>
										<span class="form-calc__label-name"><?php echo $fields['ak_complex_form_calc_serv_two'] ?></span>
									</label>
									<div class="form-calc__item-content">
										<?php echo apply_filters('the_content', $fields['ak_complex_form_calc_listtwo']); ?>
									</div>
								</div>
							</div>
						</div>
						<div class="form-calc__right">
							<div class="form-calc__right-head">
								<label class="form-calc__label-right">
									<input class="custom-checkbox form-calc__worten" type="radio" name="lektorat-calc-right" checked>
									<span class="style-checkbox"></span>
									<span class="form-calc__label-name"><?php echo $fields['ak_complex_form_calc_conditionone'] ?></span>
								</label>
								<span><?php echo $fields['ak_complex_form_calc_sep'] ?></span>
								<label class="form-calc__label-right">
									<input class="custom-checkbox form-calc__seiten" type="radio" name="lektorat-calc-right">
									<span class="style-checkbox"></span>
									<span class="form-calc__label-name"><?php echo $fields['ak_complex_form_calc_conditiontwo'] ?></span>
								</label>
							</div>
							<input class="form-calc__number" type="number" value="0">
							<div class="form-calc__price">
								<span class="form-calc__num">0</span>
								<span class="form-calc__currency"><?php echo $fields['ak_complex_form_calc_currency'] ?></span>
							</div>
							<a class="form-calc__btn btn popup-link" href="#popup-form">
								<?php echo $fields['ak_complex_form_calc_btn'] ?>
							</a>
							<div class="form-calc__right-content">
								<?php echo apply_filters('the_content', $fields['ak_complex_form_calc_right_text']); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
			});
	}

	public function lektoratPriceTable()
	{
		Block::make(__('Lektorat Price Table'))
			->add_fields(array(
				Field::make('rich_text', 'complex_price_lekt_list', __('Список Lektorat')),
				Field::make('rich_text', 'complex_price_kor_list', __('Список Korrektorat')),
				Field::make('complex', 'complex_price_lektkor_table', __('Таблица'))
					->set_layout('tabbed-horizontal')
					->setup_labels(['singular_name' => 'Строку'])
					->add_fields([
						Field::make('text', 'complex_price_lektkor_disc', __('Дисциплина'))
							->set_width(30),
						Field::make('text', 'complex_price_lektkor_disc_list', __('Список в скобках'))
							->set_width(70),
						Field::make('text', 'complex_price_lekt_pref', __('Префикс цены Lektorat'))
							->set_width(25),
						Field::make('text', 'complex_price_lekt_price', __('Цена Lektorat'))
							->set_width(25),
						Field::make('text', 'complex_price_lekt_pro', __('За что Lektorat'))
							->set_width(25),
						Field::make('text', 'complex_price_lekt_btn', __('Текст на кнопке Lektorat'))
							->set_width(25),
						Field::make('text', 'complex_price_kor_pref', __('Префикс цены Korrektorat'))
							->set_width(25),
						Field::make('text', 'complex_price_kor_price', __('Цена Korrektorat'))
							->set_width(25),
						Field::make('text', 'complex_price_kor_pro', __('За что Korrektorat'))
							->set_width(25),
						Field::make('text', 'complex_price_kor_btn', __('Текст на кнопке Korrektorat'))
							->set_width(25),
					])
					->set_header_template('
				<% if (complex_price_lektkor_disc) { %>
					<%- complex_price_lektkor_disc %>
			  	<% } else { %>
					<%- "Name" %>
				<% } %>
				'),
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>

			<div class="price-lekt">
				<div class="price-lekt__inner">
					<table class="price-lekt__table">
						<tbody>
							<?php
							$first_lek = true;
							$first_kor = true;
							$num_array = count($fields['complex_price_lektkor_table']);
							foreach ($fields['complex_price_lektkor_table'] as $k) :
							?>
								<tr>
									<td>
										<span class="price-lekt__table-title"><?php echo $k['complex_price_lektkor_disc'] ?></span>
										<span><?php echo $k['complex_price_lektkor_disc_list'] ?></span>
									</td>
									<td class="price-lekt__td-btn">
										<span class="price-lekt__pref">
											<?php echo $k['complex_price_lekt_pref'] ?>
										</span>
										<span class="price-lekt__num">
											<?php echo $k['complex_price_lekt_price'] ?>
										</span>
										<span class="price-lekt__pro">
											<?php echo $k['complex_price_lekt_pro'] ?>
										</span>
										<a class="price-lekt__btn btn popup-link" href="#popup-form">
											<?php echo $k['complex_price_lekt_btn'] ?>
										</a>
									</td>
									<?php if ($first_lek) : ?>
										<td class="price-lekt__td-list" rowspan="<?php echo $num_array ?>">
											<?php echo apply_filters('the_content', $fields['complex_price_lekt_list']); ?>
										</td>
									<?php
										$first_lek = false;
									endif
									?>
									<td class="price-lekt__td-btn">
										<span class="price-lekt__pref">
											<?php echo $k['complex_price_kor_pref'] ?>
										</span>
										<span class="price-lekt__num">
											<?php echo $k['complex_price_kor_price'] ?>
										</span>
										<span class="price-lekt__pro">
											<?php echo $k['complex_price_kor_pro'] ?>
										</span>
										<a class="price-lekt__btn btn popup-link" href="#popup-form">
											<?php echo $k['complex_price_kor_btn'] ?>
										</a>
									</td>
									<?php if ($first_kor) : ?>
										<td class="price-lekt__td-list" rowspan="<?php echo $num_array ?>">
											<?php echo apply_filters('the_content', $fields['complex_price_kor_list']); ?>
										</td>
									<?php
										$first_kor = false;
									endif
									?>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>

			</div>

		<?php
			});
	}

	public function guarantPercent()
	{
		Block::make(__('Guarant Percent'))
			->add_fields(array(
				Field::make('complex', 'unic_diagram_items', __('Карточки'))
					->set_layout('tabbed-vertical')
					->setup_labels(['singular_name' => 'карточку'])
					->add_fields([
						Field::make('image', 'unic_diagram_items_img', __('Изображение'))
							->set_width(50)
							->set_type('image')
							->set_value_type('url'),
						Field::make('text', 'unic_diagram_items_text', __('Текст'))
							->set_width(50),
					])
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>
			<div class="diagram">
				<div class="container">
					<div class="diagram__items">
						<?php foreach ($fields['unic_diagram_items'] as $k) : ?>
							<div class="diagram__item">
								<div class="diagram__item-box">
									<img class="diagram__item-icon" src="<?php echo $k['unic_diagram_items_img']; ?>" alt="<?php Helpers::imageAlt($k['unic_diagram_items_img']); ?>">
								</div>
								<div class="diagram__item-text">
									<?php echo $k['unic_diagram_items_text']; ?>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php
			});
	}

	public function teamMp()
	{
		Block::make(__('Team MP'))
			->add_fields(array(
				Field::make('complex', 'main_team_mp_card', __('Карточки'))
					->set_layout('tabbed-horizontal')
					->setup_labels(['singular_name' => 'карточку'])
					->add_fields([
						Field::make('image', 'main_team_mp_photo', __('Фото'))
							->set_type('image')
							->set_value_type('url')
							->set_width(20),
						Field::make('text', 'main_team_mp_name', __('Имя'))
							->set_width(20),
						Field::make('text', 'main_team_mp_position', __('Должность'))
							->set_width(20),
						Field::make('text', 'main_team_mp_rating', __('Рейтинг'))
							->set_width(20),
						Field::make('text', 'main_team_mp_rating_all', __('Общее число оценок'))
							->set_width(20),
						Field::make('text', 'main_team_mp_year', __('Лет работы'))
							->set_width(20),
						Field::make('text', 'main_team_mp_order', __('Число заказов'))
							->set_width(20),
						Field::make('text', 'main_team_mp_client', __('Обслужено клиентов'))
							->set_width(20),
						Field::make('text', 'main_team_mp_time', __('Время работы'))
							->set_width(20),
						Field::make('text', 'main_team_mp_whatsapp', __('WhatsApp'))
							->set_width(30),
						Field::make('text', 'main_team_mp_phone', __('Телефон'))
							->set_width(30),
						Field::make('text', 'main_team_mp_mail', __('Почта'))
							->set_width(30),
						Field::make('rich_text', 'main_team_mp_descr', __('Описание')),
					]),
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>
			<div class="team">
				<div class="container">
					<div class="team__items">
						<?php foreach ($fields['main_team_mp_card'] as $key) : ?>
							<div class="team__item">
								<div class="team__item-top">
									<div class="team__item-inner">
										<div class="team__photo-box">
											<img class="team__photo" src="<?php echo $key['main_team_mp_photo']; ?>" alt="<?php Helpers::imageAlt($key['main_team_mp_photo']); ?>">
										</div>
										<div class="team__content">
											<h3 class="team__item-name">
												<?php echo $key['main_team_mp_name']; ?>
											</h3>
											<span class="team__item-position">
												<?php echo $key['main_team_mp_position']; ?>
											</span>
											<div class="team__box">
												<span class="team__year-text">
													Jahre im Unternehmen:
												</span>
												<span class="team__year-num">
													<?php echo $key['main_team_mp_year']; ?>
												</span>
											</div>
											<div class="team__box">
												<span class="team__order-text">
													Bearbeitete Aufträge:
												</span>
												<span class="team__order-num">
													<?php echo $key['main_team_mp_order']; ?>
												</span>
											</div>
											<div class="team__box">
												<span class="team__client-text">
													Regelmäßige Kunden:
												</span>
												<span class="team__client-num">
													<?php echo $key['main_team_mp_client']; ?>
												</span>
											</div>
											<div class="team__rating">
												<?php
												$rating = floatval($key['main_team_mp_rating']) * 2;
												$ratingAll = $key['main_team_mp_rating_all'];
												$stars = intdiv($rating, 2);

												for ($i = 0; $i < $stars; $i++) {
													echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="12" height="12"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="rgba(255,189,0,1)"></path></svg>';
												}

												if ($rating % 2 != 0) {
													echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="12" height="12"><path d="M12.0006 15.968L16.2473 18.3451L15.2988 13.5717L18.8719 10.2674L14.039 9.69434L12.0006 5.27502V15.968ZM12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="rgba(255,189,0,1)"></path></svg>';
												}

												echo '
                                    <div class="team__rating-box">
                                        <span class="team__rating-num">', $rating / 2, ' / 5 </span>
                                        <span class="team__rating-all">(' . $ratingAll . ')</span>
                                    </div>';

												?>
											</div>
										</div>
									</div>
									<div class="team__descr show-less">
										<?php echo apply_filters('the_content', $key['main_team_mp_descr']); ?>
									</div>
									<span class="team__time">
										<?php echo $key['main_team_mp_time']; ?>
									</span>
								</div>
								<div class="team__item-bottom">
									<?php if (!empty($key['main_team_mp_whatsapp'])) { ?>
										<a class="team__main-whatsapp js-wapp" href="https://wa.me/<?php echo preg_replace('/[^,.0-9]/', '', $key['main_team_mp_whatsapp']); ?>"></a>
									<?php } ?>
									<?php if (!empty($key['main_team_mp_phone'])) { ?>
										<a class="team__main-phone" href="tel:+<?php echo preg_replace('/[^,.0-9]/', '', $key['main_team_mp_phone']); ?>"></a>
									<?php } ?>
									<?php if (!empty($key['main_team_mp_mail'])) { ?>
										<a class="team__main-email" href="mailto:<?php echo $key['main_team_mp_mail']; ?>"></a>
									<?php } ?>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php
			});
	}

	public function teamMo()
	{
		Block::make(__('Team MO'))
			->add_fields(array(
				Field::make('complex', 'main_team_mo_card', __('Карточки'))
					->set_layout('tabbed-horizontal')
					->setup_labels(['singular_name' => 'карточку'])
					->add_fields([
						Field::make('image', 'main_team_mo_photo', __('Фото'))
							->set_type('image')
							->set_value_type('url')
							->set_width(20),
						Field::make('text', 'main_team_mo_name', __('Имя'))
							->set_width(20),
						Field::make('text', 'main_team_mo_position', __('Должность'))
							->set_width(20),
						Field::make('text', 'main_team_mo_rating', __('Рейтинг'))
							->set_width(20),
						Field::make('text', 'main_team_mo_rating_all', __('Общее число оценок'))
							->set_width(20),
						Field::make('text', 'main_team_mo_year', __('Лет работы'))
							->set_width(20),
						Field::make('text', 'main_team_mo_order', __('Число заказов'))
							->set_width(20),
						Field::make('text', 'main_team_mo_client', __('Обслужено клиентов'))
							->set_width(20),
						Field::make('text', 'main_team_mo_time', __('Время работы'))
							->set_width(20),
						Field::make('text', 'main_team_mo_whatsapp', __('WhatsApp'))
							->set_width(30),
						Field::make('text', 'main_team_mo_phone', __('Телефон'))
							->set_width(30),
						Field::make('text', 'main_team_mo_mail', __('Почта'))
							->set_width(30),
						Field::make('rich_text', 'main_team_mo_descr', __('Описание'))
					]),
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>
			<div class="team">
				<div class="container">
					<div class="team__items">
						<?php foreach ($fields['main_team_mo_card'] as $key) : ?>
							<div class="team__item">
								<div class="team__item-top">
									<div class="team__item-inner">
										<div class="team__photo-box">
											<img class="team__photo" src="<?php echo $key['main_team_mo_photo']; ?>" alt="<?php Helpers::imageAlt($key['main_team_mo_photo']); ?>">
										</div>
										<div class="team__content">
											<h3 class="team__item-name">
												<?php echo $key['main_team_mo_name']; ?>
											</h3>
											<span class="team__item-position">
												<?php echo $key['main_team_mo_position']; ?>
											</span>
											<div class="team__box">
												<span class="team__year-text">
													Jahre im Unternehmen:
												</span>
												<span class="team__year-num">
													<?php echo $key['main_team_mo_year']; ?>
												</span>
											</div>
											<div class="team__box">
												<span class="team__order-text">
													Bearbeitete Aufträge:
												</span>
												<span class="team__order-num">
													<?php echo $key['main_team_mo_order']; ?>
												</span>
											</div>
											<div class="team__box">
												<span class="team__client-text">
													Regelmäßige Kunden:
												</span>
												<span class="team__client-num">
													<?php echo $key['main_team_mo_client']; ?>
												</span>
											</div>
											<div class="team__rating">
												<?php
												$rating = floatval($key['main_team_mo_rating']) * 2;
												$ratingAll = $key['main_team_mo_rating_all'];
												$stars = intdiv($rating, 2);

												for ($i = 0; $i < $stars; $i++) {
													echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="12" height="12"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="rgba(255,189,0,1)"></path></svg>';
												}

												if ($rating % 2 != 0) {
													echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="12" height="12"><path d="M12.0006 15.968L16.2473 18.3451L15.2988 13.5717L18.8719 10.2674L14.039 9.69434L12.0006 5.27502V15.968ZM12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="rgba(255,189,0,1)"></path></svg>';
												}

												echo '
                                    <div class="team__rating-box">
                                        <span class="team__rating-num">', $rating / 2, ' / 5 </span>
                                        <span class="team__rating-all">(' . $ratingAll . ')</span>
                                    </div>';

												?>
											</div>
										</div>
									</div>
									<div class="team__descr show-less">
										<?php echo apply_filters('the_content', $key['main_team_mo_descr']); ?>
									</div>
									<span class="team__time">
										<?php echo $key['main_team_mo_time']; ?>
									</span>
								</div>
								<div class="team__item-bottom">
									<?php if (!empty($key['main_team_mo_whatsapp'])) { ?>
										<a class="team__main-whatsapp js-wapp" href="https://wa.me/<?php echo preg_replace('/[^,.0-9]/', '', $key['main_team_mo_whatsapp']); ?>"></a>
									<?php } ?>
									<?php if (!empty($key['main_team_mo_phone'])) { ?>
										<a class="team__main-phone" href="tel:+<?php echo preg_replace('/[^,.0-9]/', '', $key['main_team_mo_phone']); ?>"></a>
									<?php } ?>
									<?php if (!empty($key['main_team_mo_mail'])) { ?>
										<a class="team__main-email" href="mailto:<?php echo $key['main_team_mo_mail']; ?>"></a>
									<?php } ?>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php
			});
	}

	public function teamMa()
	{
		Block::make(__('Team MA'))
			->add_fields(array(
				Field::make('complex', 'main_team_ma_card', __('Карточки'))
					->set_layout('tabbed-horizontal')
					->setup_labels(['singular_name' => 'карточку'])
					->add_fields([
						Field::make('image', 'main_team_ma_photo', __('Фото'))
							->set_type('image')
							->set_value_type('url')
							->set_width(20),
						Field::make('text', 'main_team_ma_name', __('Имя'))
							->set_width(20),
						Field::make('text', 'main_team_ma_position', __('Должность'))
							->set_width(20),
						Field::make('text', 'main_team_ma_rating', __('Рейтинг'))
							->set_width(20),
						Field::make('text', 'main_team_ma_rating_all', __('Общее число оценок'))
							->set_width(20),
						Field::make('text', 'main_team_ma_year', __('Лет работы'))
							->set_width(30),
						Field::make('text', 'main_team_ma_author', __('Число авторов'))
							->set_width(30),
						Field::make('text', 'main_team_ma_time', __('Время работы'))
							->set_width(30),
						Field::make('text', 'main_team_ma_whatsapp', __('WhatsApp'))
							->set_width(30),
						Field::make('text', 'main_team_ma_phone', __('Телефон'))
							->set_width(30),
						Field::make('text', 'main_team_ma_mail', __('Почта'))
							->set_width(30),
						Field::make('rich_text', 'main_team_ma_descr', __('Описание')),
					]),
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>
			<div class="team">
				<div class="container">
					<div class="team__items">
						<?php foreach ($fields['main_team_ma_card'] as $key) : ?>
							<div class="team__item">
								<div class="team__item-top">
									<div class="team__item-inner">
										<div class="team__photo-box">
											<img class="team__photo" src="<?php echo $key['main_team_ma_photo']; ?>" alt="<?php Helpers::imageAlt($key['main_team_ma_photo']); ?>">
										</div>
										<div class="team__content">
											<h3 class="team__item-name">
												<?php echo $key['main_team_ma_name']; ?>
											</h3>
											<span class="team__item-position">
												<?php echo $key['main_team_ma_position']; ?>
											</span>
											<div class="team__box">
												<span class="team__year-text">
													Jahre im Unternehmen:
												</span>
												<span class="team__year-num">
													<?php echo $key['main_team_ma_year']; ?>
												</span>
											</div>
											<div class="team__box">
												<span class="team__client-text">
													Anzahl der Autoren:
												</span>
												<span class="team__client-num">
													<?php echo $key['main_team_ma_author']; ?>
												</span>
											</div>
											<div class="team__rating">
												<?php
												$rating = floatval($key['main_team_ma_rating']) * 2;
												$ratingAll = $key['main_team_ma_rating_all'];
												$stars = intdiv($rating, 2);

												for ($i = 0; $i < $stars; $i++) {
													echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="12" height="12"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="rgba(255,189,0,1)"></path></svg>';
												}

												if ($rating % 2 != 0) {
													echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="12" height="12"><path d="M12.0006 15.968L16.2473 18.3451L15.2988 13.5717L18.8719 10.2674L14.039 9.69434L12.0006 5.27502V15.968ZM12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="rgba(255,189,0,1)"></path></svg>';
												}

												echo '
                                    <div class="team__rating-box">
                                        <span class="team__rating-num">', $rating / 2, ' / 5 </span>
                                        <span class="team__rating-all">(' . $ratingAll . ')</span>
                                    </div>';

												?>
											</div>
										</div>
									</div>
									<div class="team__descr show-less">
										<?php echo apply_filters('the_content', $key['main_team_ma_descr']); ?>
									</div>
									<span class="team__time">
										<?php echo $key['main_team_ma_time']; ?>
									</span>
								</div>
								<div class="team__item-bottom">
									<?php if (!empty($key['main_team_ma_whatsapp'])) { ?>
										<a class="team__main-whatsapp js-wapp" href="https://wa.me/<?php echo preg_replace('/[^,.0-9]/', '', $key['main_team_mamo_whatsapp']); ?>"></a>
									<?php } ?>
									<?php if (!empty($key['main_team_ma_phone'])) { ?>
										<a class="team__main-phone" href="tel:+<?php echo preg_replace('/[^,.0-9]/', '', $key['main_team_ma_phone']); ?>"></a>
									<?php } ?>
									<?php if (!empty($key['main_team_ma_mail'])) { ?>
										<a class="team__main-email" href="mailto:<?php echo $key['main_team_ma_mail']; ?>"></a>
									<?php } ?>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php
			});
	}

	public function teamDev()
	{
		Block::make(__('Team Dev'))
			->add_fields(array(
				Field::make('complex', 'main_team_dev_card', __('Карточки'))
					->set_layout('tabbed-horizontal')
					->setup_labels(['singular_name' => 'карточку'])
					->add_fields([
						Field::make('image', 'main_team_dev_photo', __('Фото'))
							->set_type('image')
							->set_value_type('url')
							->set_width(25),
						Field::make('text', 'main_team_dev_name', __('Имя'))
							->set_width(25),
						Field::make('text', 'main_team_dev_position', __('Должность'))
							->set_width(25),
						Field::make('text', 'main_team_dev_time', __('Время работы'))
							->set_width(25)
					]),
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>
			<div class="team">
				<div class="container">
					<div class="team__items">
						<?php foreach ($fields['main_team_dev_card'] as $key) : ?>
							<div class="team__item alt">
								<div class="team__item-top">
									<div class="team__item-inner">
										<div class="team__photo-box">
											<img class="team__photo" src="<?php echo $key['main_team_dev_photo']; ?>" alt="<?php Helpers::imageAlt($key['main_team_dev_photo']); ?>">
										</div>
										<div class="team__content">
											<h3 class="team__item-name">
												<?php echo $key['main_team_dev_name']; ?>
											</h3>
											<span class="team__item-position">
												<?php echo $key['main_team_dev_position']; ?>
											</span>
											<div class="team__box">
												<span class="team__time">
													<?php echo $key['main_team_dev_time']; ?>
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php
			});
	}

	public function cooperationBlock()
	{
		Block::make(__('Cooperation Block'))
			->add_fields(array(
				Field::make('complex', 'cooperation_card', __('Карточки'))
					->set_layout('tabbed-horizontal')
					->setup_labels(['singular_name' => 'карточку'])
					->add_fields([
						Field::make('image', 'cooperation_card_icon', __('Иконка'))
							->set_width(30)
							->set_type('image')
							->set_value_type('url'),
						Field::make('text', 'cooperation_card_title', __('Заголовок карточки'))
							->set_width(30),
						Field::make('textarea', 'cooperation_card_text', __('Текст'))
							->set_width(40)
							->set_rows(3),
					])
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>
			<section class="cooperation">
				<div class="container">
					<div class="cooperation__items">
						<?php foreach ($fields['cooperation_card'] as $key) : ?>
							<div class="cooperation__item">
								<div class="cooperation__item-head">
									<img class="cooperation__item-icon" src="<?php echo $key['cooperation_card_icon']; ?>" alt="<?php Helpers::imageAlt($key['cooperation_card_icon']); ?>">
									<p class="cooperation__item-title">
										<?php echo $key['cooperation_card_title']; ?>
									</p>
								</div>
								<?php if (!empty($key['cooperation_card_text'])) : ?>
									<div class="cooperation__text">
										<?php echo $key['cooperation_card_text']; ?>
									</div>
								<?php endif ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</section>
		<?php
			});
	}

	public function oldFaq()
	{
		Block::make(__('Old FAQ'))
			->add_fields(array(
				Field::make('complex', 'local_faq_tab', __('Табы'))
					->set_layout('tabbed-vertical')
					->setup_labels(['singular_name' => 'таб'])
					->add_fields([
						Field::make('text', 'local_faq_tab_name', __('Заголовок')),
						Field::make('complex', 'local_faq_items', __('FAQ'))
							->set_layout('tabbed-horizontal')
							->setup_labels(['singular_name' => 'FAQ'])
							->add_fields([
								Field::make('text', 'local_faq_head', __('Вопрос')),
								Field::make('rich_text', 'local_faq_content', __('Ответ')),
							])
					])
					->set_header_template('
				<% if (local_faq_tab_name) { %>
					<%- local_faq_tab_name %>
			  	<% } else { %>
					<%- "Name" %>
				<% } %>
				')
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>
			<div class="main-faq">
				<div class="container">
					<div class="main-faq__wrapper">
						<div class="tab main-faq__tab">
							<div class="tab__nav-inner main-faq__nav-inner">
								<?php foreach ($fields['local_faq_tab'] as $key) : ?>
									<div class="tab__nav main-faq__nav">
										<?php echo $key['local_faq_tab_name']; ?>
									</div>
								<?php endforeach; ?>
							</div>
							<div class="main-faq__content-inner">
								<?php foreach ($fields['local_faq_tab'] as $key) : ?>
									<div class="tab__content main-faq__tab-content">
										<p class="main-faq__tab-title">
											<?php echo $key['local_faq_tab_name']; ?>
										</p>
										<?php foreach ($key['local_faq_items'] as $k) : ?>
											<div class="main-faq__item">
												<div class="main-faq__inner">
													<div class="main-faq__head">
														<div class="main-faq__inner-icon">
															<img src="<?php echo get_template_directory_uri() ?>/resources/images/icons/pluse-new.svg" alt="pluse two">
														</div>
														<p class="main-faq__inner-title" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
															<?php echo $k['local_faq_head']; ?>
														</p>
													</div>
													<div class="main-faq__content">
														<div style="min-height:0;">
															<div class="main-faq__text" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
																<?php echo apply_filters('the_content', $k['local_faq_content']); ?>
															</div>
														</div>
													</div>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
			});
	}

	public function interviewBlock()
	{
		Block::make(__('Interview Block'))
			->add_fields(array(
				Field::make('complex', 'bewert_fields', __('Интервью'))
					->set_layout('tabbed-vertical')
					->setup_labels(['singular_name' => 'интервью'])
					->add_fields([
						Field::make('image', 'bewert_field_img', __('Аватар'))
							->set_type('image')
							->set_value_type('url')
							->set_width(30),
						Field::make('text', 'bewert_field_name', __('Имя клиента'))
							->set_width(70),
						Field::make('text', 'bewert_field_art', __('Art der Arbeit'))
							->set_width(50),
						Field::make('text', 'bewert_field_art_name', __('Название Art der Arbeit'))
							->set_width(50),
						Field::make('text', 'bewert_field_fach', __('Fachbereich'))
							->set_width(50),
						Field::make('text', 'bewert_field_fach_name', __('Название Fachbereich'))
							->set_width(50),
						Field::make('textarea', 'bewert_field_text', __('Текст в карточке')),
						Field::make('complex', 'bewert_field_content', __('Контент интервью'))
							->set_layout('tabbed-vertical')
							->setup_labels(['singular_name' => 'контент'])
							->add_fields('bewert_field_interw', 'Интервьюер', [
								Field::make('image', 'bewert_field_author_img', __('Иконка автора'))
									->set_type('image')
									->set_value_type('url')
									->set_width(30),
								Field::make('text', 'bewert_field_author_name', __('Имя автора'))
									->set_width(70),
								Field::make('textarea', 'bewert_field_author_quest', __('Вопрос')),
							])
							->add_fields('bewert_field_cust', 'Клиент', [
								Field::make('image', 'bewert_field_cust_img', __('Иконка автора'))
									->set_type('image')
									->set_value_type('url')
									->set_width(30),
								Field::make('text', 'bewert_field_cust_name', __('Имя автора'))
									->set_width(70),
								Field::make('textarea', 'bewert_field_cust_quest', __('Ответ')),
							])
					])
					->set_header_template('
					<% if (bewert_field_name) { %>
						<%- bewert_field_name %>
						<% } else { %>
						<%- "Name" %>
					<% } %>
					')
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>
			<div class="interview">
				<div class="container">
					<?php foreach ($fields['bewert_fields'] as $key) : ?>
						<div class="interview__inner">
							<div class="interview__info">
								<div class="interview__card">
									<div class="interview__card-head">
										<div class="interview__card-imgbox">
											<img class="interview__card-img" src="<?php echo $key['bewert_field_img']; ?>">
										</div>
										<div class="interview__card-name">
											<?php echo $key['bewert_field_name']; ?>
										</div>
									</div>
									<div class="interview__meta">
										<div class="interview__meta-item">
											<span class="interview__meta-text">
												<?php echo $key['bewert_field_art']; ?>
											</span>
											<span class="interview__meta-text">
												<?php echo $key['bewert_field_art_name']; ?>
											</span>
										</div>
										<div class="interview__meta-item">
											<span class="interview__meta-text">
												<?php echo $key['bewert_field_fach']; ?>
											</span>
											<span class="interview__meta-text">
												<?php echo $key['bewert_field_fach_name']; ?>
											</span>
										</div>
									</div>
									<div class="interview__card-text">
										<?php echo $key['bewert_field_text']; ?>
									</div>
								</div>
							</div>
							<div class="interview__content">
								<?php
								$data = $key['bewert_field_content'];
								foreach ($data as $k) {
									switch ($k['_type']) {
										case 'bewert_field_interw':
											if (!$k['bewert_field_author_name']) {
												break;
											} ?>
											<div class="interview__content-inner">
												<div class="interview__content-head">
													<div class="interview__content-imgbox">
														<img class="interview__content-img" src="<?php echo $k['bewert_field_author_img']; ?>" alt="<?php Helpers::imageAlt($k['bewert_field_author_img']); ?>">
													</div>
													<div class="interview__content-name">
														<?php echo $k['bewert_field_author_name']; ?>
													</div>
												</div>
												<div class="interview__content-text">
													<?php echo $k['bewert_field_author_quest']; ?>
												</div>
											</div>
										<?php
											break;
										case 'bewert_field_cust':
											if (!$k['bewert_field_cust_name']) {
												break;
											} ?>
											<div class="interview__content-inner">
												<div class="interview__content-head">
													<div class="interview__content-imgbox">
														<img class="interview__content-img" src="<?php echo $k['bewert_field_cust_img']; ?>" alt="<?php Helpers::imageAlt($k['bewert_field_cust_img']); ?>">
													</div>
													<div class="interview__content-name">
														<?php echo $k['bewert_field_cust_name']; ?>
													</div>
												</div>
												<div class="interview__content-text">
													<?php echo $k['bewert_field_cust_quest']; ?>
												</div>
											</div>
								<?php
											break;
									}
								}
								?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php
			});
	}

	public function gutenbergGoals()
	{
		Block::make(__('Goals Block'))
			->add_fields(array(
				Field::make('complex', 'goals_card', __('Карточки'))
					->set_layout('tabbed-horizontal')
					->setup_labels(['singular_name' => 'карточку'])
					->add_fields([
						Field::make('image', 'goals_card_icon', __('Иконка'))
							->set_width(20)
							->set_type('image')
							->set_value_type('url'),
						Field::make('text', 'goals_card_title', __('Заголовок карточки'))
							->set_width(20),
						Field::make('rich_text', 'cooperation_card_text', __('Текст'))
							->set_width(60),
					])
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>
			<div class="goals">
				<div class="goals__items">
					<?php foreach ($fields['goals_card'] as $key) : ?>
						<div class="goals__item">
							<div class="goals__img">
								<img src="<?php echo $key['goals_card_icon']; ?>" alt="<?php Helpers::imageAlt($key['goals_card_icon']); ?>">
							</div>
							<h4 class="goals__header">
								<?php echo $key['goals_card_title']; ?>
							</h4>
							<div class="goals__text">
								<?php echo apply_filters('the_content', $key['cooperation_card_text']); ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php
			});
	}

	public function contactImpressum()
	{
		Block::make(__('Contact Impressum'))
			->add_fields(array(
				Field::make('complex', 'i_connetct_card', __('Карточки'))
					->set_layout('tabbed-horizontal')
					->setup_labels(['singular_name' => 'карточку'])
					->add_fields([
						Field::make('image', 'i_connetct_icon', __('Иконка'))
							->set_width(50)
							->set_type('image')
							->set_value_type('url'),
						Field::make('text', 'i_connetct_title', __('Заголовок карточки'))
							->set_width(50),
						Field::make('rich_text', 'i_connetct_text_one', __('Контакты'))
							->set_width(50),
						Field::make('rich_text', 'i_connetct_text_two', __('Кнопки'))
							->set_width(50),
					])
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>
			<div class="connect">
				<div class="connect__items">
					<?php foreach ($fields['i_connetct_card'] as $key) : ?>
						<div class="connect__item">
							<div class="connect__item-inner">
								<div class="connect__item-img">
									<img src="<?php echo $key['i_connetct_icon']; ?>" alt="<?php Helpers::imageAlt($key['i_connetct_icon']); ?>">
								</div>
								<p class="connect__item-title">
									<?php echo $key['i_connetct_title']; ?>
								</p>
								<div class="connect__item-box">
									<?php echo apply_filters('the_content', $key['i_connetct_text_one']); ?>
								</div>
							</div>
							<?php echo apply_filters('the_content', $key['i_connetct_text_two']); ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php
			});
	}

	public function gutenbergMap()
	{
		Block::make(__('Map Block'))
			->add_fields(array(
				Field::make('textarea', 'i_map_link', __('Сылка на карту из Гугл карт'))
					->set_rows(3),
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>
			<div class="map-contact">
				<div class="map-lazy --load-map" style="height: 600px;" data-map="<?php echo $fields['i_map_link'] ?>">
				</div>
			</div>
		<?php
			});
	}

	public function gutenbergEdulab()
	{
		Block::make(__('Edulab Block'))
			->add_fields(array(
				Field::make('complex', 'i_edulab_col', __('Колонки'))
					->set_layout('tabbed-horizontal')
					->setup_labels(['singular_name' => 'колонку'])
					->add_fields([
						Field::make('complex', 'i_edulab_row', __('Строки'))
							->set_layout('tabbed-horizontal')
							->setup_labels(['singular_name' => 'строку'])
							->add_fields([
								Field::make('text', 'i_edulab_text_left', __('Текст слева'))
									->set_width(50),
								Field::make('text', 'i_edulab_text_right', __('Текст справа'))
									->set_width(50),
							])
					])
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>
			<div class="edulab">
				<div class="edulab__inner">
					<?php foreach ($fields['i_edulab_col'] as $key) : ?>
						<div class="edulab__col">
							<?php foreach ($key['i_edulab_row'] as $k) : ?>
								<div class="edulab__item">
									<span class="edulab__reg">
										<?php echo $k['i_edulab_text_left']; ?>
									</span>
									<span>
										<?php echo $k['i_edulab_text_right']; ?>
									</span>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php
			});
	}

	public function impressumForm()
	{
		Block::make(__('Impressum Form'))
			->add_fields(array(
				Field::make('text', 'i_form_title', __('Заголовок формы')),
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>
			<div class="blitz">
				<div class="container">
					<h2 class="blitz__title"><?php echo $fields['i_form_title']; ?></h2>
					<p class="blitz__sub">Hinterlassen Sie Ihre E-Mail und erhalten Sie Informationen über attraktive Angebote! Nur günstige Angebote ohne Spam und unnötige Informationen.</p>
					<?php get_template_part('parts/blocks/form-blitz'); ?>
					<p class="form-main__protect-title form-main__coaching-protect">
						Ihre Anfrage ist unverbindlich.<br>
						Ihre Daten werden streng vertraulich behandelt und nicht an Dritte weitergegeben.
					</p>
					<p class="form-main__text-protect">
						<label class="form-litle__check-inner form-main__check">
							<input class="custom-checkbox" type="checkbox" name="Kontakt nur über WhatsApp" checked>
							<span class="style-checkbox"></span>
							<span class="form-litle__check-text">Die Hinweise aus der <a href="https://akademily.de/datenschutz/" target="_blank">Datenschutzerklärung</a> und den <a href="https://akademily.de/agb/" target="_blank" title="Datenschutzerklärung">AGB</a> habe ich gelesen und akzeptiere diese.</span>
						</label>
					</p>
				</div>
			</div>
		<?php
			});
	}

	public function impressumSocial()
	{
		Block::make(__('Social Block'))
			->add_fields(array(
				Field::make('text', 'i_social_link', __('Заголовок')),
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>
			<div class="webw">
				<div class="container">
					<h2 class="estimate__title title"><?php echo $fields['i_social_link'] ?></h2>
					<div class="webw__items">
						<a class="webw__link" href="https://www.facebook.com/akademily">
							<img src="<?php echo DE_URI; ?>/resources/images/social/facebook.svg" alt="facebook icon">
						</a>
						<a class="webw__link" href="https://www.linkedin.com/in/akademily-de-1a5295206/">
							<img src="<?php echo DE_URI; ?>/resources/images/social/linkedin.svg" alt="linkedin icon">
						</a>
						<a class="webw__link" href="https://www.instagram.com/akademily/">
							<img src="<?php echo DE_URI; ?>/resources/images/social/instagram.svg" alt="instagram icon">
						</a>
						<a class="webw__link" href="https://www.youtube.com/@Akademily">
							<img src="<?php echo DE_URI; ?>/resources/images/social/youtube.svg" alt="youtube icon">
						</a>
						<a class="webw__link" href="https://twitter.com/akademily">
							<img src="<?php echo DE_URI; ?>/resources/images/social/twitter.svg" alt="twitter icon">
						</a>
						<a class="webw__link" href="https://pin.it/SkorQaB">
							<img src="<?php echo DE_URI; ?>/resources/images/social/pinterest.svg" alt="pinterest icon">
						</a>
						<a class="webw__link" href="https://www.flickr.com/photos/199670292@N07/">
							<img src="<?php echo DE_URI; ?>/resources/images/social/flickr.svg" alt="flickr icon">
						</a>
					</div>
				</div>
			</div>
		<?php
			});
	}

	public function gutenbergSteps()
	{
		Block::make(__('Steps Block'))
			->add_fields(array(
				Field::make('complex', 'g_accordeon_work', __('Шаги работы'))
					->set_layout('tabbed-horizontal')
					->setup_labels(['singular_name' => 'карточку'])
					->add_fields([
						Field::make('text', 'g_accordeon_work_title', __('Заголовок аккордеона')),
						Field::make('textarea', 'g_accordeon_work_text', __('Текст аккордеона'))
							->set_rows(3),
						Field::make('checkbox', 'g_accordeon_work_btn_show', __('Показать кнопку?'))
							->set_width(30),
						Field::make('text', 'g_accordeon_work_btn', __('Текст на кнопке'))
							->set_width(40),
						Field::make('image', 'g_accordeon_work_image', __('Изображение слева'))
							->set_width(30)
							->set_type('image')
							->set_value_type('url'),
					])
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>
			<div class="section steps">
				<div class="steps__body swiper">
					<div class="steps__items swiper-wrapper">
						<?php
						$num = 1;
						$first = TRUE;
						foreach ($fields['g_accordeon_work'] as $key) :
						?>
							<div class="steps__item swiper-slide">
								<div class="steps__item-inner">
									<img class="steps__icon" src="<?php echo $key['g_accordeon_work_image']; ?>" alt="<?php Helpers::imageAlt($key['g_accordeon_work_image']); ?>">
									<div class="steps__content">
										<div class="steps__head">
											<div class="steps__num">
												<span><?php echo $num++; ?></span>
											</div>
											<h3 class="steps__item-title">
												<?php echo $key['g_accordeon_work_title']; ?>
											</h3>
										</div>
										<p class="steps__item-text">
											<?php echo $key['g_accordeon_work_text']; ?>
										</p>
									</div>
									<?php
									if ($first == TRUE) :
										if (!empty($key['g_accordeon_work_btn_show'])) : ?>
											<a class="steps__btn btn popup-link" href="#popup-form">
												<?php echo $key['g_accordeon_work_btn']; ?>
											</a>
									<?php endif;
										$first = FALSE;
									endif;
									?>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="steps__navigate">
					<div class="steps__prev">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="rgba(50,93,156,1)">
							<path d="M4.83578 12L11.0429 18.2071L12.4571 16.7929L7.66421 12L12.4571 7.20712L11.0429 5.79291L4.83578 12ZM10.4857 12L16.6928 18.2071L18.107 16.7929L13.3141 12L18.107 7.20712L16.6928 5.79291L10.4857 12Z"></path>
						</svg>
					</div>
					<div class="steps__pagination"></div>
					<div class="steps__next">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="rgba(50,93,156,1)">
							<path d="M19.1642 12L12.9571 5.79291L11.5429 7.20712L16.3358 12L11.5429 16.7929L12.9571 18.2071L19.1642 12ZM13.5143 12L7.30722 5.79291L5.89301 7.20712L10.6859 12L5.89301 16.7929L7.30722 18.2071L13.5143 12Z"></path>
						</svg>
					</div>
				</div>
			</div>
		<?php
			});
	}

	public function newGuarant()
	{
		Block::make(__('New Guarant'))
			->add_fields(array(
				Field::make('complex', 'g_guarant_card', __('Карточки'))
					->set_layout('tabbed-horizontal')
					->setup_labels(['singular_name' => 'карточку'])
					->add_fields([
						Field::make('text', 'g_guarant_card_title', __('Заголовок')),
						Field::make('text', 'g_guarant_card_subtitle', __('Подзаголовок')),
						Field::make('image', 'g_guarant_card_img', __('Иконка'))
							->set_type('image')
							->set_value_type('url'),
					])
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>
			<div class="new-guarant">
				<div class="new-guarant__slider">
					<div class="new-guarant__prev">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="rgba(50,93,156,1)">
							<path d="M4.83578 12L11.0429 18.2071L12.4571 16.7929L7.66421 12L12.4571 7.20712L11.0429 5.79291L4.83578 12ZM10.4857 12L16.6928 18.2071L18.107 16.7929L13.3141 12L18.107 7.20712L16.6928 5.79291L10.4857 12Z"></path>
						</svg>
					</div>
					<div class="new-guarant__next">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="rgba(50,93,156,1)">
							<path d="M19.1642 12L12.9571 5.79291L11.5429 7.20712L16.3358 12L11.5429 16.7929L12.9571 18.2071L19.1642 12ZM13.5143 12L7.30722 5.79291L5.89301 7.20712L10.6859 12L5.89301 16.7929L7.30722 18.2071L13.5143 12Z"></path>
						</svg>
					</div>
					<div class="new-guarant__body swiper">
						<div class="new-guarant__items swiper-wrapper">
							<?php foreach ($fields['g_guarant_card'] as $key) : ?>
								<div class="new-guarant__item swiper-slide">
									<div class="new-guarant__item-inner">
										<img class="new-guarant__icon" src="<?php echo $key['g_guarant_card_img']; ?>" alt="<?php Helpers::imageAlt($key['g_guarant_card_img']); ?>">
										<p class="new-guarant__item-title">
											<?php echo $key['g_guarant_card_title']; ?>
										</p>
										<p class="new-guarant__item-text">
											<?php echo $key['g_guarant_card_subtitle']; ?>
										</p>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				<div class="new-guarant__pagination"></div>
			</div>
		<?php
			});
	}

	public function sidebarGuarant()
	{
		Block::make(__('Guarant Sidebar'))
			->add_fields(array(
				Field::make('complex', 's_guarant_card', __('Карточки'))
					->set_layout('tabbed-horizontal')
					->setup_labels(['singular_name' => 'карточку'])
					->add_fields([
						Field::make('text', 's_guarant_card_title', __('Заголовок')),
						Field::make('text', 's_guarant_card_subtitle', __('Подзаголовок')),
						Field::make('image', 's_guarant_card_img', __('Иконка'))
							->set_type('image')
							->set_value_type('url'),
					])
			))
			->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>
			<div class="section new-guarant home-guarant">
				<div class="new-guarant__slider">
					<div class="new-guarant__prev home-guarant__prev">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="rgba(50,93,156,1)">
							<path d="M4.83578 12L11.0429 18.2071L12.4571 16.7929L7.66421 12L12.4571 7.20712L11.0429 5.79291L4.83578 12ZM10.4857 12L16.6928 18.2071L18.107 16.7929L13.3141 12L18.107 7.20712L16.6928 5.79291L10.4857 12Z"></path>
						</svg>
					</div>
					<div class="new-guarant__next home-guarant__next">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="rgba(50,93,156,1)">
							<path d="M19.1642 12L12.9571 5.79291L11.5429 7.20712L16.3358 12L11.5429 16.7929L12.9571 18.2071L19.1642 12ZM13.5143 12L7.30722 5.79291L5.89301 7.20712L10.6859 12L5.89301 16.7929L7.30722 18.2071L13.5143 12Z"></path>
						</svg>
					</div>
					<div class="home-guarant__body swiper">
						<div class="home-guarant__items swiper-wrapper">
							<?php foreach ($fields['s_guarant_card'] as $key) : ?>
								<div class="home-guarant__item swiper-slide">
									<div class="new-guarant__item-inner">
										<img class="new-guarant__icon" src="<?php echo $key['s_guarant_card_img']; ?>" alt="<?php Helpers::imageAlt($key['s_guarant_card_img']); ?>">
										<p class="new-guarant__item-title">
											<?php echo $key['s_guarant_card_title']; ?>
										</p>
										<p class="new-guarant__item-text">
											<?php echo $key['s_guarant_card_subtitle']; ?>
										</p>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				<div class="home-guarant__pagination"></div>
			</div>
<?php
			});
	}
}

new GutenbergFields();
