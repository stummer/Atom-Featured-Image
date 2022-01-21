<?php

namespace AtomFeaturedImage;

class AdminSettings
{
    public static function register()
    {
        $page = new self();
        add_action('admin_init', array($page, 'configure'));
        add_action('admin_menu', array($page, 'add_admin_page'));
    }


    public function add_admin_page()
    {
        add_options_page(__('Atom Featured Image', 'atom_featured_image'), __('Atom Featured Image', 'atom_featured_image'), 'install_plugins', 'atom_featured_image', array($this, 'render'));
    }


    public function configure()
    {
        // Register settings
        register_setting('atom_featured_image', 'atom_featured_image');

        // General Section
        add_settings_section('atom_featured_image_general', __('General', 'atom_featured_image'), array($this, 'render_general_section'), 'atom_featured_image');
        add_settings_field('atom_featured_image_size', __('Default Image Size', 'atom_featured_image'), array($this, 'render_size_field'), 'atom_featured_image', 'atom_featured_image_general');
    }


    public function render()
    {
        ?>
        <div class="wrap" id="atom_featured_image-admin">
            <h2><?php _e('Admin Featured Image', 'atom_featured_image'); ?></h2>
            <form action="options.php" method="POST">
                <?php settings_fields('atom_featured_image'); ?>
                <?php do_settings_sections('atom_featured_image'); ?>
                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }


    public function render_general_section()
    {
        ?>
        <p><?php _e('Atom Featured Image Settings.', 'atom_featured_image'); ?></p>
        <?php
    }


    public function render_size_field()
    {
      $options = Options::get_instance();
        ?>
        <input id="atom_featured_image_size" name="atom_featured_image[image_size]" type="number" value="<?php echo $options->get('image_size', ATOM_IMAGE_DEFAULT_SIZE); ?>" />
        <?php
    }
}
