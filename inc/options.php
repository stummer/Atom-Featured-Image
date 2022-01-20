<?php

namespace AtomFeaturedImage;

class Options
{
    protected static $_instance = null;
    private $options = null;


    public static function get_instance()
    {
        if (null === self::$_instance)
            self::$_instance = new self;

        return self::$_instance;
    }


    protected function __clone()
    {
    }


    protected function __construct()
    {
        $options = get_option('atom_featured_image', array());
        $this->options = $options;
    }


    public function get($name, $default = null)
    {
        if ($this->exists($name))
            return $this->options[$name];

        return $default;
    }


    public function exists($name)
    {
        return isset($this->options[$name]);
    }


    public function set($name, $value)
    {
        $this->options[$name] = $value;
    }


    public function flush()
    {
        update_option('atom_featured_image', $this->options);
    }
}
