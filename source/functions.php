<?php

/** Constants */
define('DE_PATH', __DIR__);
define('DE_URI', get_template_directory_uri());
define('DE_HOMEPAGE', get_option('page_on_front'));
define('TYPES', json_decode(file_get_contents(DE_URI . '/data/types.json'), true));
define('SPEC', json_decode(file_get_contents(DE_URI . '/data/spec.json'), true));


/** Settings WordPress */
require_once 'src/General.php';
require_once 'src/Helpers.php';

/** Settings meta fields */
require_once 'src/CarbonFields/CommonMeta.php';
require_once 'src/CarbonFields/PageMeta.php';
require_once 'src/CarbonFields/PostMeta.php';
require_once 'src/CarbonFields/GutenbergFields.php';
require_once 'src/CarbonFields/MainMeta.php';
require_once 'src/CarbonFields/TermMeta.php';

// Ajax search
require_once 'src/AjaxSearch.php';

// Page Navigation
require_once 'src/PageNavigation.php';

/** Feedback */
require_once 'src/PrivateConstants.php';
require_once 'src/Feedback.php';
