<?php

/**
 * functions.php - Procedural part of Plugin Name.
 *
 * @package PluginPackage
 * @author Your Name <username@example.com>
 * @copyright 2019 Your Name or Company Name
 * @license GPL-2.0-or-later http://www.gnu.org/licenses/gpl-2.0.txt
 * @link https://example.com/plugin-name
 */

declare(strict_types=1);

namespace Company\WordPress\PluginName;

use WP_CLI;

use function current_user_can;
use function deactivate_plugins;
use function esc_html__;
use function esc_url;
use function load_plugin_textdomain;

/**
 * @return void
 */
function loadTextDomain()
{
    load_plugin_textdomain('plugin-slug', false, dirname(Config::get('baseName')) . '/languages');
}

/**
 * @return void
 */
function activate()
{
    // FIXME Move reqs+deactivation here???
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
    deactivate_plugins([Config::get('baseName')], true);

    // Run database migrations, initialize WordPress options etc.
}

/**
 * @return void
 */
function deactivate()
{
    // Do something related to deactication.
}

/**
 * @return void
 */
function uninstall()
{
    // Remove custom database tables, WordPress options etc.
}

/**
 * @return void
 */
function printRequirementsNotice()
{
    // phpcs:ignore Squiz.PHP.DiscouragedFunctions.Discouraged
    error_log('Plugin Name requirements are not met. Please read the Installation instructions.');

    if (! current_user_can('activate_plugins')) {
        return;
    }

    printf(
        '<div class="notice notice-error"><p>%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s</p></div>',
        esc_html__('Plugin Name activation failed! Please read', 'plugin-slug'),
        esc_url('https://github.com/szepeviktor/small-project#readme'),
        esc_html__('the Installation instructions', 'plugin-slug'),
        esc_html__('for list of requirements.', 'plugin-slug')
    );
}

/**
 * @return void
 */
function registerCliCommands()
{
    WP_CLI::add_command('example', ExampleCommand::class);
}

/**
 * Start!
 *
 * @return void
 */
function boot()
{
    new ClassName();
}
