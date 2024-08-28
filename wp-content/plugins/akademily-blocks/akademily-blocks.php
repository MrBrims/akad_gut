<?php

/**
 * Plugin Name:       Akademily Blocks
 * Description:       Example block scaffolded with Create Block tool.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       akad-blocks
 *
 * @package           create-block
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function akademily_blocks_register()
{
	register_block_type(__DIR__ . '/build/block-section');
	register_block_type(__DIR__ . '/build/block-article');
	register_block_type(__DIR__ . '/build/block-image');
	register_block_type(__DIR__ . '/build/block-video');
	register_block_type(__DIR__ . '/build/block-withSidebar');
	register_block_type(__DIR__ . '/build/block-withSidebar/block-withSidebarContent');
	register_block_type(__DIR__ . '/build/block-withSidebar/block-withSidebarSidebar');
}
add_action('init', 'akademily_blocks_register');
