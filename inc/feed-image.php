<?php

namespace AtomFeaturedImage;

class FeedImage
{
    public static function register()
    {
        $image = new self();
        add_action('atom_entry', array($image, 'create_atom_icon_tag'));
    }


    public function create_atom_icon_tag()
    {
        global $post;
        if (!has_post_thumbnail($post->ID))
            echo '';

        $options = Options::get_instance();
        echo '<icon>' . get_the_post_thumbnail_url($post->ID, $options->get('image_size'), ATOM_IMAGE_DEFAULT_SIZE) . '</icon>';
    }
}
