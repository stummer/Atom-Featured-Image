<?php
/*
Plugin Name: Atom Featured Image
Plugin URI: https://github.com/stummer/Atom-Featured-Image
Description: Adds the featured image of posts to the atom feed
Version: 0.3.0
Author: Henning Stummer
Author URI: https://github.com/stummer
License: GPLv3
*/

defined('ABSPATH') || exit();

define('ATOM_IMAGE_CAPABILITY',   'customize'); // Admin
define('ATOM_IMAGE_DEFAULT_SIZE', 'medium');


require_once dirname(__FILE__) . '/inc/options.php';
require_once dirname(__FILE__) . '/inc/feed-image.php';
require_once dirname(__FILE__) . '/inc/loader.php';

\AtomFeaturedImage\Loader::init();
