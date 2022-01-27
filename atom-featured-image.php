<?php
/*
Plugin Name:       Atom Featured Image
Plugin URI:        https://github.com/stummer/Atom-Featured-Image
Description:       Adds the featured image to the atom feed post entry
Version:           0.4.0
Requires at least: 5.3
Author:            Henning Stummer
Author URI:        https://github.com/stummer
License:           GPL v3 or later
License URI:       https://www.gnu.org/licenses/gpl-3.0
Text Domain:       atom_featured_image
Domain Path:       /languages
*/

defined('ABSPATH') || exit();

define('ATOM_IMAGE_BASE_PATH', dirname(__FILE__));
define('ATOM_IMAGE_DEFAULT_SIZE', 'medium');


require_once ATOM_IMAGE_BASE_PATH . '/includes/options.php';
require_once ATOM_IMAGE_BASE_PATH . '/includes/feed-image.php';
require_once ATOM_IMAGE_BASE_PATH . '/includes/admin-settings.php';
require_once ATOM_IMAGE_BASE_PATH . '/includes/loader.php';

\AtomFeaturedImage\Loader::init();
