<?php

use Carbon_Fields\Field;

class CommonMeta
{

	// Global Fields

	public static function globalContact(): array
	{
		return [
			Field::make('text', 'global_phone', __('Телефон'))
				->set_width(30),
			Field::make('text', 'global_email', __('Почта'))
				->set_width(30),
			Field::make('text', 'global_whatsapp', __('WhatsApp'))
				->set_width(30)
		];
	}

	public static function globalGifts(): array
	{
		return [
			Field::make('image', 'akad_gift_img', __('Изображение акции'))
				->set_type('image')
				->set_value_type('url'),
			Field::make('text', 'akad_gift_width', __('Размер акции')),
		];
	}

	public static function globalInfo(): array
	{
		return [
			Field::make('text', 'global_time', __('Время работы'))
				->set_width(50),
			Field::make('text', 'global__adress', __('Адрес'))
				->set_width(50)
		];
	}

	public static function globalRating(): array
	{
		return [
			Field::make('text', 'rating_google', __('Рейтинг Google'))
				->set_width(30),
			Field::make('text', 'rating_provent', __('Рейтинг Provent'))
				->set_width(30),
			Field::make('text', 'rating_akademily', __('Рейтинг Akademily'))
				->set_width(30),
		];
	}

	public static function postRating(): array
	{
		return [
			Field::make('text', 'rating_value_md', __('Текущий рэйтинг'))
				->set_width(50)
				->help_text('Дробные через точку'),
			Field::make('text', 'rating_count_md', __('Число оценок'))
				->set_width(50),
		];
	}

	public static function pageRating(): array
	{
		return [
			Field::make('text', 'rating_value_pmd', __('Текущий рэйтинг'))
				->set_width(30)
				->help_text('Дробные через точку'),
			Field::make('text', 'rating_count_pmd', __('Число оценок'))
				->set_width(30),
			Field::make('text', 'price_pmd', __('Цена'))
				->set_width(30),
		];
	}

	public static function globalTeam(): array
	{
		return [
			Field::make('complex', 'team_card', __('Слайдер менеджеров'))
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
		];
	}

	public static function globalHowWork(): array
	{
		return [
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
		];
	}

	public static function globalGuarantMeta(): array
	{
		return [
			Field::make('text', 'guarant_title', __('Заголовок')),
			Field::make('text', 'guarant_subtitle', __('Подзаголовок')),
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
		];
	}

	public static function globalFaq(): array
	{
		return [
			Field::make('text', 'faq_title', __('Заголовок')),
			Field::make('complex', 'faq_items', __('FAQ'))
				->set_layout('tabbed-horizontal')
				->setup_labels(['singular_name' => 'FAQ'])
				->add_fields([
					Field::make('text', 'faq_head', __('Вопрос')),
					Field::make('rich_text', 'faq_content', __('Ответ')),
				])
		];
	}

	public static function globalMainFaq(): array
	{
		return [
			Field::make('complex', 'main_faq_tab', __('Табы'))
				->set_layout('tabbed-vertical')
				->setup_labels(['singular_name' => 'таб'])
				->add_fields([
					Field::make('text', 'main_faq_tab_name', __('Заголовок')),
					Field::make('complex', 'main_faq_items', __('FAQ'))
						->set_layout('tabbed-horizontal')
						->setup_labels(['singular_name' => 'FAQ'])
						->add_fields([
							Field::make('text', 'main_faq_head', __('Вопрос')),
							Field::make('rich_text', 'main_faq_content', __('Ответ')),
						])
				])
				->set_header_template('
				<% if (main_faq_tab_name) { %>
					<%- main_faq_tab_name %>
			  	<% } else { %>
					<%- "Name" %>
				<% } %>
				')
		];
	}

	public static function globalContactWhatsapp(): array
	{
		return [
			Field::make('textarea', 'contact_whatsapp_title', __('Заголовок'))
				->set_width(30)
				->set_rows(3),
			Field::make('textarea', 'contact__whatsapp_subtitle', __('Подзаголовок'))
				->set_width(30)
				->set_rows(3),
			Field::make('text', 'contact__whatsapp_btn', __('Текст на кнопке'))
				->set_width(30),
		];
	}

	public static function globalReviews(): array
	{
		return [
			Field::make('text', 'reviews_title', __('Заголовок')),
			Field::make('complex', 'soc_reviews', __('Отзывы с соц. сетей'))
				->set_width(30)
				->set_layout('tabbed-horizontal')
				->setup_labels(['singular_name' => 'Отзыв'])
				->add_fields([
					Field::make('image', 'soc_reviews_img', __('Картинка'))
						->set_type('image')
						->set_value_type('url'),
				]),
			Field::make('complex', 'soc_reviews_coach', __('Отзывы для Coaching'))
				->set_width(30)
				->set_layout('tabbed-horizontal')
				->setup_labels(['singular_name' => 'Отзыв'])
				->add_fields([
					Field::make('image', 'soc_reviews_img', __('Картинка'))
						->set_type('image')
						->set_value_type('url'),
				]),
			Field::make('complex', 'soc_reviews_lektor', __('Отзывы для Lektorat'))
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
		];
	}

	public static function qualGlobalMeta(): array
	{
		return [
			Field::make('text', 'qualification_title', __('Заголовок')),
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
		];
	}

	public static function bakalavrGlobalMeta(): array
	{
		return [
			Field::make('text', 'bakalavr_title', __('Заголовок')),
			Field::make('rich_text', 'bakalavr_list', __('Список')),
		];
	}

	public static function teamGlobalMeta(): array
	{
		return [
			Field::make('separator', 'main_team_mp', __('Отдел МП')),
			Field::make('text', 'main_team_mp_title', __('Заголовок')),
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
			Field::make('separator', 'main_team_mo', __('Отдел МО')),
			Field::make('text', 'main_team_mo_title', __('Заголовок')),
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
			Field::make('separator', 'main_team_ma', __('Отдел МА')),
			Field::make('text', 'main_team_ma_title', __('Заголовок')),
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
			Field::make('separator', 'main_team_dev', __('Отдел ДЕВ-МАРКЕТИНГ')),
			Field::make('text', 'main_team_dev_title', __('Заголовок')),
			Field::make('complex', 'main_team_dev_card', __('Карточки'))
				->set_layout('tabbed-horizontal')
				->setup_labels(['singular_name' => 'карточку'])
				->add_fields([
					Field::make('image', 'main_team_dev_photo', __('Фото'))
						->set_type('image')
						->set_value_type('url')
						->set_width(10),
					Field::make('text', 'main_team_dev_name', __('Имя'))
						->set_width(25),
					Field::make('text', 'main_team_dev_position', __('Должность'))
						->set_width(25),
					Field::make('text', 'main_team_dev_time', __('Время работы'))
						->set_width(25)
				]),
			Field::make('separator', 'main_team_fin', __('ФИН Отдел')),
			Field::make('text', 'main_team_fin_title', __('Заголовок')),
			Field::make('complex', 'main_team_fin_card', __('Карточки'))
				->set_layout('tabbed-horizontal')
				->setup_labels(['singular_name' => 'карточку'])
				->add_fields([
					Field::make('image', 'main_team_fin_photo', __('Фото'))
						->set_type('image')
						->set_value_type('url')
						->set_width(10),
					Field::make('text', 'main_team_fin_name', __('Имя'))
						->set_width(25),
					Field::make('text', 'main_team_fin_position', __('Должность'))
						->set_width(25),
					Field::make('text', 'main_team_fin_time', __('Время работы'))
						->set_width(25)
				]),
		];
	}

	public static function globalFooter(): array
	{
		return [
			Field::make('image', 'footer_logo', __('Логотип в футере'))
				->set_type('image')
				->set_width('30')
				->set_value_type('url'),
			Field::make('rich_text', 'footer_text', __('Текст в нижней части'))
				->set_width(30),
			Field::make('text', 'footer_schedule_text', __('Текст после время работы'))
				->set_width(30),
			Field::make('text', 'footer_title_schedule', __('Заголовок время работы'))
				->set_width(25),
			Field::make('text', 'footer_title_pay', __('Заголовок способов оплаты'))
				->set_width(25),
			Field::make('text', 'footer_title_menu', __('Заголовок меню'))
				->set_width(25),
			Field::make('text', 'footer_title_rev', __('Заголовок отзовиков'))
				->set_width(25),
			Field::make('complex', 'footer_soc', __('Социальные сети'))
				->set_layout('tabbed-horizontal')
				->setup_labels(['singular_name' => 'социальную сеть'])
				->add_fields([
					Field::make('text', 'footer_link_soc', __('Ссылка на соц. сеть'))
						->set_width(50),
					Field::make('image', 'footer_icon_soc', __('Иконка соц. сети'))
						->set_width(50)
						->set_type('image')
						->set_value_type('url'),
				]),
			Field::make('complex', 'footer_pay', __('Способы оплаты'))
				->set_layout('tabbed-horizontal')
				->setup_labels(['singular_name' => 'способ оплаты'])
				->add_fields([
					Field::make('image', 'footer_pay_icons', __('Иконка способа оплаты'))
						->set_type('image')
						->set_value_type('url'),
				]),
			Field::make('complex', 'footer_rev', __('Отзывики'))
				->set_layout('tabbed-horizontal')
				->setup_labels(['singular_name' => 'отзовик'])
				->add_fields([
					Field::make('image', 'footer_rev_icons', __('Иконка отзовика'))
						->set_type('image')
						->set_value_type('url')
						->set_width(60),
					Field::make('text', 'footer_rev_link', __('Ссылка на отзовик'))
						->set_width(40),
				]),
			Field::make('rich_text', 'footer_uber_links', __('Ссылки Über uns'))
				->set_width(30),
			Field::make('rich_text', 'footer_blog_links', __('Ссылки Blog'))
				->set_width(30),
			Field::make('rich_text', 'footer_other_links', __('Прочие ссылки'))
				->set_width(30),
			Field::make('rich_text', 'footer_arbeit_links', __('Wir arbeiten in'))
				->set_width(50),
			Field::make('rich_text', 'footer_ghost_links', __('GHOSTWRITING'))
				->set_width(50),
			Field::make('rich_text', 'footer_fach_links', __('Fachbereiche'))
				->set_width(50),
			Field::make('rich_text', 'footer_lekt_links', __('Lektorat & Korrekturlesen'))
				->set_width(50),
			Field::make('rich_text', 'footer_and_links', __('Andere Dienste'))
				->set_width(50),
			Field::make('complex', 'footer_icons_plag', __('Иконки плагиата'))
				->set_layout('tabbed-horizontal')
				->setup_labels(['singular_name' => 'иконку'])
				->set_width(60)
				->add_fields([
					Field::make('image', 'footer_icon_plag', __('Иконки'))
						->set_type('image')
						->set_value_type('url'),
				]),
			Field::make('rich_text', 'footer_hilfe_links', __('Hilfe & coaching'))
				->set_width(50),
			Field::make('complex', 'footer_icons_trust', __('Траст бейджи'))
				->set_layout('tabbed-horizontal')
				->setup_labels(['singular_name' => 'бейдж'])
				->add_fields([
					Field::make('image', 'footer_icon_trust', __('Бейджи'))
						->set_type('image')
						->set_value_type('url'),
				])
		];
	}

	public static function globalScripts(): array
	{
		return [
			Field::make('header_scripts', 'header_script', __('Header Script')),
			Field::make('footer_scripts', 'footer_script', __('Footer Script')),
		];
	}

	public static function globalApiKey(): array
	{
		return [
			Field::make('text', 'telegram_api', __('API Telegram')),
		];
	}

	// Meta Field

	public static function heroMeta(): array
	{
		return [
			Field::make('image', 'hero_img', __('Картинка перед формой'))
				->set_type('image')
				->set_width(20)
				->set_value_type('url'),
			Field::make('rich_text', 'hero_text', __('Текст после заголовка')),
			Field::make('select', 'ak_hero_form', 'Выбор формы')
				->set_width(40)
				->add_options(
					array(
						'parts/blocks/form-litle' => 'Маленька общая',
						'parts/blocks/form-online' => 'Для онлайнов',
						'parts/blocks/form-coach' => 'Для коачинга',
						'parts/blocks/form-lektorat' => 'Для лектората',
					)
				),
			Field::make('text', 'ak_hero_form_title', __('Заголовок формы'))
				->set_default_value('Anruf bestellen')
				->set_width(40),
			Field::make('select', 'ak_herotype', 'Выбор первого экрана')
				->set_width(50)
				->add_options(
					array(
						'parts/sections/hero' => 'Большой',
						'parts/sections/hero-small' => 'Маленький',
					)
				),
			Field::make('image', 'herosmall_bg', __('Фон маленькой шапки'))
				->set_type('image')
				->set_value_type('url')
				->set_width(30),
		];
	}

	public static function staticMeta(): array
	{
		return [
			Field::make('text', 'statistic_title', __('Заголовок')),
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
		];
	}

	public static function coachingMeta(): array
	{
		return [
			Field::make('text', 'coaching_title', __('Заголовок')),
			Field::make('rich_text', 'coaching_text', __('Контент секции Coaching')),
		];
	}

	public static function bigFom(): array
	{
		return [
			Field::make('text', 'ak_bigform_title_car', __('Заголовок формы')),
			Field::make('checkbox', 'ak_bigform_check_car', __('Сделать поле  Thema der Arbeit обязательным?'))
				->set_width(30),
			Field::make('text', 'ak_bigform_btn_text_car', __('Текст на кнопке'))
				->set_default_value('JETZT ANFRAGEN')
				->set_width(30),
			Field::make('text', 'ak_bigform_siten_num_car', __('Количество страниц'))
				->set_default_value('5')
				->set_width(30),
			Field::make('select', 'ak_complex_global_select_car', 'Выбор формы')
				->add_options(
					array(
						'parts/blocks/form-main-new' => 'Большая общая',
						'parts/blocks/form-main-online' => 'Для онлайнов',
						'parts/blocks/form-main-coach' => 'Для коачинга',
						'parts/blocks/form-main-lekt' => 'Для лектората + общая',
					)
				)
		];
	}

	public static function relaxMeta(): array
	{
		return [
			Field::make('text', 'relax_title', __('Заголовок')),
			Field::make('rich_text', 'relax_text', __('Контент')),
			Field::make('text', 'relax_btn', __('Текст на кнопке')),
		];
	}

	public static function howWorkMeta(): array
	{
		return [
			Field::make('text', 'how-work_title_after', __('Заголовок перед аккордеоном')),
			Field::make('rich_text', 'how-work_text_after', __('Текст перед аккордеоном')),
			Field::make('text', 'how-work_title_before', __('Заголовок после аккордеона')),
			Field::make('rich_text', 'how-work_text_before', __('Текст после аккордеона')),
		];
	}

	public static function messageMeta(): array
	{
		return [
			Field::make('text', 'message_title', __('Заголовок')),
			Field::make('text', 'message_subtitle', __('Подзаголовок'))
				->help_text('Для выделения части текста оберните ее в тег span'),
		];
	}

	public static function richAfterForm(): array
	{
		return [
			Field::make('rich_text', 'rich_after_form', __('Текст после формы')),
		];
	}

	public static function localFaq(): array
	{
		return [
			Field::make('text', 'local_faq_title', __('Заголовок')),
			Field::make('checkbox', 'global_faq_show', __('Отключить глобальный FAQ?')),
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
		];
	}

	public static function richText(): array
	{
		return [
			Field::make('rich_text', 'rich_text', __('Текст')),
		];
	}

	public static function mainPriceTab(): array
	{
		return [
			Field::make('text', 'price_main_title', __('Заголовок')),
			Field::make('complex', 'price_tab_main', __('Прайс'))
				->set_layout('tabbed-vertical')
				->setup_labels(['singular_name' => 'контент'])
				->add_fields([
					Field::make('text', 'price_tab_name', __('Название таба'))
						->set_width(20),
					Field::make('textarea', 'price_tab_note', __('Подсказка к названию'))
						->set_width(70)
						->set_rows(3),
					Field::make('text', 'price_tab_num', __('Цена'))
						->set_width(10),
				])
				->set_header_template('
				<% if (price_tab_name) { %>
					<%- price_tab_name %>
			  	<% } else { %>
					<%- "Name" %>
				<% } %>
				')
		];
	}

	public static function richAfterReviews(): array
	{
		return [
			Field::make('rich_text', 'rich_after_reviews', __('Текст после формы')),
		];
	}

	public static function titlePrice(): array
	{
		return [
			Field::make('text', 'price_title_1', __('Заголовок 1')),
			Field::make('text', 'price_title_2', __('Заголовок 2')),
			Field::make('text', 'price_title_3', __('Заголовок 3')),
			Field::make('text', 'price_title_4', __('Заголовок 4')),
			Field::make('text', 'price_title_5', __('Заголовок 5')),
		];
	}

	public static function priceList(): array
	{
		return [
			Field::make('text', 'price_list_title', __('Заголовок')),
			Field::make('text', 'price_list_th_1', __('Первая ячейка заголовка'))
				->set_width(25),
			Field::make('text', 'price_list_th_2', __('Вторя ячейка заголовка'))
				->set_width(25),
			Field::make('text', 'price_list_th_3', __('Третья ячейка заголовка'))
				->set_width(25),
			Field::make('text', 'price_list_th_4', __('Четвертая ячейка заголовка'))
				->set_width(25),
			Field::make('complex', 'price_list_table', __('Содержание таблицы'))
				->set_layout('tabbed-horizontal')
				->setup_labels(['singular_name' => 'строку'])
				->add_fields([
					Field::make('text', 'price_list_td_1', __('Первая ячейка'))
						->help_text('Название')
						->set_width(25),
					Field::make('text', 'price_list_td_2', __('Вторя ячейка'))
						->help_text('Время')
						->set_width(25),
					Field::make('text', 'price_list_td_3', __('Третья ячейка'))
						->help_text('Цена')
						->set_width(25),
					Field::make('text', 'price_list_td_4', __('Четвертая ячейка'))
						->help_text('Текст кнопки')
						->set_width(25),
				])
		];
	}

	public static function richTextTwo(): array
	{
		return [
			Field::make('rich_text', 'rich_text_two', __('Текст после диаграмы'))
				->help_text('Текст после диаграммы'),
		];
	}

	public static function richTextThree(): array
	{
		return [
			Field::make('rich_text', 'rich_text_three', __('Текст 3'))
				->help_text('Текст после прайса'),
		];
	}

	public static function diagramMeta(): array
	{
		return [
			Field::make('text', 'diagram_title', __('Заголовок')),
			Field::make('complex', 'diagram_list', __('Список'))
				->set_layout('tabbed-horizontal')
				->setup_labels(['singular_name' => 'итем'])
				->add_fields([
					Field::make('text', 'diagram_list_text', __('Текст')),
				]),
			Field::make('image', 'diagram_img', __('Изображение'))
				->set_type('image')
				->set_value_type('url'),
			Field::make('text', 'diagram_subtitle', __('Подзаголовок')),
			Field::make('complex', 'diagram_items', __('Карточки'))
				->set_layout('tabbed-horizontal')
				->setup_labels(['singular_name' => 'карточку'])
				->add_fields([
					Field::make('image', 'diagram_items_img', __('Изображение'))
						->set_width(50)
						->set_type('image')
						->set_value_type('url'),
					Field::make('text', 'diagram_items_text', __('Текст'))
						->set_width(50),
				])
		];
	}

	public static function localPriceTab(): array
	{
		return [
			Field::make('text', 'local_price_title', __('Заголовок')),
			Field::make('complex', 'local_price_tab_nav', __('Названия табов'))
				->help_text('Порядковый номер названия соответствует порядковому номеру контента')
				->set_layout('tabbed-horizontal')
				->setup_labels(['singular_name' => 'название'])
				->add_fields([
					Field::make('text', 'local_price_tab_name', __('Название таба'))
						->set_width(30),
					Field::make('textarea', 'local_price_tab_note', __('Подсказка к названию'))
						->set_width(70)
						->set_rows(3),
				]),
			Field::make('complex', 'local_price_tab_content', __('Контент табов'))
				->set_layout('tabbed-horizontal')
				->setup_labels(['singular_name' => 'контент'])
				->add_fields([
					Field::make('textarea', 'local_price_tab_note', __('Примечание'))
						->set_width(70)
						->set_rows(3),
					Field::make('text', 'local_price_tab_btn', __('Текст на кнопке'))
						->set_width(30),
					Field::make('text', 'local_price_tab_num_pref', __('Текст перед ценой'))
						->set_width(25),
					Field::make('text', 'local_price_tab_num', __('Цена'))
						->set_width(25),
					Field::make('text', 'local_price_tab_num_currency', __('Валюта'))
						->set_width(25),
					Field::make('text', 'local_price_tab_num_after', __('Текст после цены'))
						->set_width(25),
					Field::make('rich_text', 'local_price_tab_list', __('Сипсок')),
				])
		];
	}

	public static function cooperationLocal(): array
	{
		return [
			Field::make('text', 'cooperation_title', __('Заголовок')),
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
		];
	}

	public static function microdataStar(): array
	{
		return [
			Field::make('text', 'microdata_rating', __('Текущая оценка'))
				->set_width(30),
			Field::make('text', 'microdata_all_rating', __('Всего оценок'))
				->set_width(30),
			Field::make('text', 'microdata_price', __('Цена'))
				->set_width(30),
		];
	}

	public static function bewertungerInt(): array
	{
		return [
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
		];
	}
}
