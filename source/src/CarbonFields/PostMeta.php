<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class PostMeta
{
	public function __construct()
	{
		add_action('carbon_fields_register_fields', [$this, 'defaultPostMeta']);
	}

	public function defaultPostMeta()
	{
		Container::make('post_meta', 'carbon_fields_container_default_post', 'Рейтинг')
			->where('post_type', '=', 'post')
			->add_tab(__('Рэйтинг'), CommonMeta::postRating());
	}
}

new PostMeta();
