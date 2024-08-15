<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class PageMeta
{
	public function __construct()
	{
		add_action('carbon_fields_register_fields', [$this, 'defaultPage']);
	}

	public function defaultPage()
	{
		Container::make('post_meta', __('Настройки страницы'))
			->where('post_type', '=', 'page')
			->where('post_template', '=', 'default')
			->add_tab(__('Первый экран'), CommonMeta::heroMeta())
			->add_tab(__('Рейтинг'), CommonMeta::pageRating())
			->add_tab(__('Акция'), CommonMeta::globalGifts())
			->add_tab(__('Форма в попапе'), CommonMeta::bigFom());
	}
}

new PageMeta();
