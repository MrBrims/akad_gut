<?php

class General
{

	public function __construct()
	{
		add_action('wp_enqueue_scripts', [$this, 'themeScriptsAndStyles']);

		add_action('do_robotstxt', [$this, 'addedRobotsTxt']);

		add_action('init', [$this, 'settingsAdminWP']);

		/* Отключение XML-RPC */
		add_filter('xmlrpc_enabled', '__return_false');

		// add_action('init', [$this, 'set_tocken']);

		add_action('wp_enqueue_scripts', [$this, 'removeCode']);

		add_action('init', [$this, 'utmSource']);

		add_filter('nav_menu_css_class', [$this, 'addClassMenuItems'], 1, 3);
		add_filter('xmlrpc_enabled', '__return_false');

		// Загрузка svg
		add_filter('upload_mimes', [$this, 'svgUploadAllow']);
		add_filter('wp_check_filetype_and_ext', [$this, 'fix_svg_mime_type'], 10, 5);

		// Скрыть стандартный редактор для страниц указанный в массиве
		add_action('admin_init', [$this, 'hide_editor']);

		// Подключение js и css для админки
		add_action('admin_enqueue_scripts', [$this, 'adminStyleScript'], 99);
		add_action('rest_api_init', [$this, 'akadJson']);

		// Регистрация кастомной категории для гутенберга
		add_filter('block_categories_all', [$this, 'my_block_categories']);
	}

	// Регистрация кастомной категории для гутенберга
	public function my_block_categories($categories)
	{
		$my_category = array(
			'slug' => 'custom-akad-category',
			'title' => __('Блоки Академили'),
			'icon'  => 'welcome-learn-more',
		);

		// Добавляем мою категорию в начало массива
		array_unshift($categories, $my_category);

		return $categories;
	}

	public function akadJson()
	{
		function getJsonSpec()
		{
			// Путь к JSON
			$fileDir = DE_URI . '/data/spec.json';

			// Извлечение содержимого
			$fileContent = file_get_contents($fileDir);

			// Парсинг и присвоение переменной
			$jsonContent = json_decode($fileContent, true);

			return $jsonContent;
		}

		function getJsonType()
		{
			// Путь к JSON
			$fileDir = DE_URI . '/data/types.json';

			// Извлечение содержимого
			$fileContent = file_get_contents($fileDir);

			// Парсинг и присвоение переменной
			$jsonContent = json_decode($fileContent, true);

			return $jsonContent;
		}

		register_rest_route(
			'my-namespace/v2',
			'/spec/',
			array(
				'methods' => 'GET',
				'callback' => 'getJsonSpec',
			)
		);

		register_rest_route(
			'my-namespace/v2',
			'/type/',
			array(
				'methods' => 'GET',
				'callback' => 'getJsonType',
			)
		);
	}

	// Подключение js и css для админки
	public function adminStyleScript()
	{
		wp_enqueue_style('style-admin', get_template_directory_uri() . '/resources/css/admin.css');
		wp_enqueue_script('script-admin', get_template_directory_uri() . '/resources/js/admin.js');
	}

	// Скрыть стандартный редактор для страниц указанный в массиве
	public function hide_editor()
	{
		$post_id = isset($_GET['post']) ? $_GET['post'] : (isset($_POST['post_ID']) ? $_POST['post_ID'] : null);
		if (!$post_id)
			return;

		// Список шаблонов страниц, для которых нужно скрыть редактор
		$hide_editor_on_templates = array(
			'pages/halfe-page.php',
			'pages/lektorat-page.php',
			// добавьте названия шаблонов страниц, для которых нужно скрыть редактор
		);

		$current_template = get_page_template_slug($post_id);
		if (in_array($current_template, $hide_editor_on_templates)) {
			remove_post_type_support('page', 'editor');
		}
	}

	// Добавление utm_source в куки
	public static function utmSource()
	{
		if (isset($_GET['utm_source'])) {
			$utm_source = $_GET['utm_source'];
			// Устанавливаем куку с именем "utm_source" и значением $utm_source на 1 день
			setcookie('utm_source', json_encode($utm_source), time() + (1 * 24 * 60 * 60), '/');
		}
	}

	// Разрешает добавлять svg
	public function svgUploadAllow($mimes)
	{
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	# Исправление MIME типа для SVG файлов.
	function fix_svg_mime_type($data, $file, $filename, $mimes, $real_mime = '')
	{

		// WP 5.1 +
		if (version_compare($GLOBALS['wp_version'], '5.1.0', '>=')) {
			$dosvg = in_array($real_mime, ['image/svg', 'image/svg+xml']);
		} else {
			$dosvg = ('.svg' === strtolower(substr($filename, -4)));
		}

		// mime тип был обнулен, поправим его
		// а также проверим право пользователя
		if ($dosvg) {

			// разрешим
			if (current_user_can('manage_options')) {

				$data['ext'] = 'svg';
				$data['type'] = 'image/svg+xml';
			}
			// запретим
			else {
				$data['ext'] = false;
				$data['type'] = false;
			}
		}

		return $data;
	}

	public function themeScriptsAndStyles()
	{
		// wp_enqueue_script('bootstrap', DE_URI . '/assets/js/bootstrap.bundle.min.js', [], '1.7', true);
		// wp_enqueue_script('swiper', DE_URI . '/assets/js/swiper-bundle.min.js', [], '1.7', true);
		// wp_enqueue_script('main', DE_URI . '/assets/js/main.js', [], '1.7', true);

		$version = filemtime(get_template_directory() . '/resources/js/app.min.js');
		wp_enqueue_script('new', DE_URI . '/resources/js/app.min.js', [], $version, true);

		// wp_enqueue_style('bootstrap', DE_URI . '/assets/css/bootstrap.min.css', [], '1.7');
		// wp_enqueue_style('swiper', DE_URI . '/assets/css/swiper.min.css', [], '1.7');
		// wp_enqueue_style('main', DE_URI . '/style.css', [], '1.7');

		$version = filemtime(get_template_directory() . '/resources/css/app.min.css');
		wp_enqueue_style('new', DE_URI . '/resources/css/app.min.css', [], $version);
	}

	public function removeCode()
	{
		wp_dequeue_style('wp-block-library');
	}

	// Add class menu items
	public function addClassMenuItems($classes, $item, $args)
	{
		if (isset($args->add_li_class)) {
			$classes[] = $args->add_li_class;
		}
		return $classes;
	}


	public function settingsAdminWP()
	{
		register_nav_menu('top-menu', 'Top menu');
		register_nav_menu('mobile-menu', 'Mobile menu');
		register_nav_menu('side-menu', 'Side menu');
		register_nav_menu('bottom-menu', 'Bottom menu');
		register_nav_menu('footer-menu', 'Footer menu');
		register_nav_menu('topheader-menu', 'Top header menu');

		add_theme_support('post-thumbnails', ['post', 'page']);
		add_theme_support('title-tag');
	}


	public function set_tocken()
	{
		$token = bin2hex(random_bytes(32));
		setcookie('csrf_token', $token, time() + 3600, '/');
	}

	public static function get_utm()
	{
		$out = array();
		$keys = array('utm_source', 'utm_medium', 'utm_campaign', 'utm_content', 'utm_term');
		foreach ($keys as $row) {
			if (!empty($_GET[$row])) {
				$value = strval($_GET[$row]);
				$value = stripslashes($value);
				$value = htmlspecialchars_decode($value, ENT_QUOTES);
				$value = strip_tags($value);
				$value = htmlspecialchars($value, ENT_QUOTES);
				$out[] = '<input type="hidden" name="' . $row . '" value="' . $value . '">';
			}
		}
		return implode("\r\n", $out);
	}
}

new General();
