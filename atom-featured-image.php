<?php
/*
Plugin Name: Atom Featured Image
Plugin URI: https://github.com/stummer
Description: Adds the featured image of posts to the atom feed
Version: 0.1.0
Author: Henning Stummer
Author URI: https://github.com/stummer
License: CC BY-NC-SA
License URI: https://creativecommons.org/licenses/by-nc-sa/4.0/
*/

defined( 'ABSPATH' ) || exit();

define('ATOM_IMAGE_CAPABILITY',   'customize'); // Admin
define('ATOM_IMAGE_DEFAULT_SIZE', 'medium');


// Execute when the plugin is enabled
function activate_atom_featured_image()
{
    $version = get_option('atom_featured_image_version', 0);

    if ($version < 1) {
        add_option('atom_featured_image_size', ATOM_IMAGE_DEFAULT_SIZE);
        update_option('atom_featured_image_version', 1);
    }
}
register_activation_hook(__FILE__, 'activate_atom_featured_image');


// Add the <image> tag to the post's atom entry
function atom_entry_featured_image()
{
    global $post;
    if (has_post_thumbnail($post->ID)) {
        echo '\t\t<image>' . get_the_post_thumbnail_url($post->ID, get_option('atom_featured_image_size')) . '</image>\n';
        return;
    }
    echo '';
}
add_action('atom_entry', 'atom_entry_featured_image');
