<?php

namespace AtomFeaturedImage;

class Loader
{
    public static function init()
    {
        $options = Options::get_instance();

        FeedImage::register();
        AdminSettings::register();
    }
}
