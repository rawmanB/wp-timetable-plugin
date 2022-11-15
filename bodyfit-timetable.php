<?php

/**
 * @link              https://www.cogbranding.com.au
 * @since             1.0.0
 * @package           bodyfit-timetable
 *
 * @wordpress-plugin
 * Plugin Name:       Bodyfit Timetable
 * Plugin URI:        https://www.cogbranding.com.au/
 * Description:       Time table for weekly schedule for different location
 * Version:           1.0.0
 * Author:            COG
 * Author URI:        https://www.cogbranding.com.au/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bodyfit-timetable
 * Domain Path:       /languages
 */


// RETURN IF CALLED DIRECTLY BY PATH
if (!defined('WPINC')) {
    die;
}

define('BODYFIT_TIMETABLE_PLUGIN_VERSION', '1.0.0');
require plugin_dir_path(__FILE__) . 'inc/bodyfit.php';
require plugin_dir_path(__FILE__) . 'inc/bodyfit_cpt.php';
