<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class MainMeta
{
	public function __construct()
	{
		add_action('carbon_fields_register_fields', [$this, 'mainMeta']);
	}

	public function mainMeta()
	{
		Container::make('theme_options', 'Глобальные поля')
			->add_tab(__('Глобальные контакты'), CommonMeta::globalContact())
			->add_tab(__('Общая информация'), CommonMeta::globalInfo())
			->add_tab(__('Рейтинг'), CommonMeta::globalRating())
			->add_tab(__('Контакт WhatsApp'), CommonMeta::globalContactWhatsapp())
			->add_tab(__('Подвал'), CommonMeta::globalFooter())
			->add_tab(__('Скрипты'), CommonMeta::globalScripts())
			->add_tab(__('API'), CommonMeta::globalApiKey());
	}
}

new MainMeta();
