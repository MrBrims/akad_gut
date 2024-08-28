<?php

/**
 * Plugin Name:       Akademily Gutenberg
 * Description:       Akademily Gutenberg Blocks.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Brims
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       akad-gutenberg
 *
 * @package CreateBlock
 */

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function create_block_akad_gutenberg_block_init()
{
	register_block_type(__DIR__ . '/build/qualification');
	register_block_type(__DIR__ . '/build/guarant');
	register_block_type(__DIR__ . '/build/stepsWork');
}
add_action('init', 'create_block_akad_gutenberg_block_init');

function akad_gut_plugin_styles()
{
	wp_enqueue_style('akad-gut-plugin-style', plugins_url('css/style.css', __FILE__));
}
add_action('admin_enqueue_scripts', 'akad_gut_plugin_styles');
