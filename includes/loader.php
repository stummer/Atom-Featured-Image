<?php

namespace AtomFeaturedImage;

class Loader
{
    public static function init()
    {
        load_plugin_textdomain('atom_featured_image', false, basename(ATOM_IMAGE_BASE_PATH) . '/languages' );

        $options = Options::get_instance();

        FeedImage::register();
        AdminSettings::register();
    }
}
