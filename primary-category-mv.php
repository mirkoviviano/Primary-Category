<?php
/*
Plugin Name: Primary Category MV
Plugin URI: https://github.com/mirkoviviano/Primary-Category
Description: Set a primary category for WordPress posts.
Author: Mirko Viviano
Author URI: https://mirkoviviano.it
Version: 1.0.0
Text Domain: primary-category
Primary Category MV

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

if (!defined('ABSPATH')) exit;

define('PLUGIN_DIR', plugin_dir_path(__FILE__));

include PLUGIN_DIR . 'includes/primary-category.php';
include PLUGIN_DIR . 'shortcode.php';

$categoryBox = new \MKR\MVPrimaryCategory\PrimaryCategory();
$shortCode   = new \MKR\MVPrimaryCategory\PrimaryCategoryShortcode();