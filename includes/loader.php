<?php

namespace AtomFeaturedImage;

class Loader
{
    public static function init()
    {
        load_plugin_textdomain('atom_featured_image', false, dirname(plugin_basename(__FILE__)) . '/languages/' );
        $options = Options::get_instance();

        FeedImage::register();
        AdminSettings::register();
    }
}
