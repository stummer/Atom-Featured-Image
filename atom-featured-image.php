<?php
/*
Plugin Name: Atom Featured Image
Plugin URI: https://github.com/stummer/Atom-Featured-Image
Description: Adds the featured image of posts to the atom feed
Version: 0.2.0
Author: Henning Stummer
Author URI: https://github.com/stummer
License: GPLv3
*/

defined('ABSPATH') || exit();

define('ATOM_IMAGE_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('ATOM_IMAGE_CAPABILITY',   'customize'); // Admin
define('ATOM_IMAGE_DEFAULT_SIZE', 'medium');


require_once(ATOM_IMAGE_PLUGIN_DIR . 'inc/class.atom-feature-image.php');
$atomFeaturedImage = new AtomFeaturedImage();


// Execute when the plugin is enabled
register_activation_hook(__FILE__, array($atomFeaturedImage, 'activate'));


// Add the <image> tag to the post's atom entry
add_action('atom_entry', array($atomFeaturedImage, 'create_image_tag'));
