<?php

/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'akad_gut');

/** Имя пользователя базы данных */
define('DB_USER', 'root');

/** Пароль к базе данных */
define('DB_PASSWORD', '');

/** Имя сервера базы данных */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'y?GBh]DXrlhTcBe+f5-xLdZKhj9(.BlFQ 4O41AE5NHTg,_>g}THrF4a*$&zrh}2');
define('SECURE_AUTH_KEY',  'd}}^NlHa!VcD)%v%):Qj|*7ZC`/Cm3@e5izrrQV8TFhx%6+m$&{?*?eikO?zfyIK');
define('LOGGED_IN_KEY',    'A0Q!J01!B%u8?oVRNq6Sb3:7i7uf`yN-,Ad+R^5t, {AvAti*18%LD:1!2Rl*pM*');
define('NONCE_KEY',        'gK s-E%QS?IRRU{h`,U7I,>qQyD`TVR+p@38%tJhJ(6e-+x<)JPv=H6GhDV_@6uM');
define('AUTH_SALT',        '>0!Anf_TH>8hmMTG8mE{Kb71~d}5k5S70<BLsn1`_C-5&g_5n[?hgMm|xhM=):Ub');
define('SECURE_AUTH_SALT', '^h)>Wr!$a?lmvJ:U)jY#+{tB3,kR[-Kj@wgf}Jj4fl|0v~=-9E0%S) e6=>a-.@d');
define('LOGGED_IN_SALT',   'l.L(O[T4ZI`q94f<qX>N;Dn=f?KMt`<.[Q2^<83KS>hdA2}Ih}|+@h_^daYhn62^');
define('NONCE_SALT',       'lKV*;ub:yLo5:*H0i7kA+gYA80ZnceJs5&/tP7JI+|3Wt]a7&,W70fen4}e+6|R*');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */

// Отключить файловый редактор в админке
define('DISALLOW_FILE_EDIT', true);

// Отключить автоматическое обновление ядра
define('WP_AUTO_UPDATE_CORE', false);


/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
