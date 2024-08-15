<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class TermMeta
{
	public function __construct()
	{
		add_action('carbon_fields_register_fields', [$this, 'addMetaFields']);
	}

	public function addMetaFields()
	{
		Container::make('term_meta', 'carbon_fields_container_term_meta', 'Настройки категории')
			->where('term_taxonomy', '=', 'category')
			->add_fields([
				Field::make('image', 'term_hero_bg', __('Фон шапки'))
					->set_value_type('url')
					->set_type('image'),
			]);
	}
}

new TermMeta();
