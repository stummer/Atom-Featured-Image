<?php

class AtomFeaturedImage
{
    protected function __construct()
    {
    }

    public function activate()
    {
        add_option('atom_featured_image_size', ATOM_IMAGE_DEFAULT_SIZE);
    }

    public function create_image_tag()
    {
        global $post;
        if (has_post_thumbnail($post->ID))
            echo '\t\t<image>' . get_the_post_thumbnail_url($post->ID, get_option('atom_featured_image_size')) . '</image>\n';

        echo '';
    }
}
