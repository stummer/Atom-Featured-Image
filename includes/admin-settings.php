<?php
/**
* Atom Featured Image Admin GUI
*
* @package Atom Featured Image
* @since 1.0.0
**/
namespace AtomFeaturedImage;

/*
* AdminSettings
* @since 1.0.0
*/
class AdminSettings
{
    /*
    * Register the admin menu and pages
    * @since 1.0.0
    */
    public static function register()
    {
        $admin = new self();
        $plugin = ATOM_IMAGE_BASE_NAME;
        add_filter("plugin_action_links_$plugin", array($admin, 'settings_link'));

        add_action('admin_init', array($admin, 'configure'));
        add_action('admin_menu', array($admin, 'add_admin_page'));
    }


    /*
    * Adding link to admin settings page to the list of installed plugins
    * @since 1.0.1
    */
    public function settings_link($links)
    {
        $settings_link = '<a href="options-general.php?page=atom_featured_image">' . __('Settings') . '</a>';
        array_push($links, $settings_link);
        return $links;
    }


    /*
    * Adding admin menu to the WordPress Settings Menu
    * @since 1.0.0
    */
    public function add_admin_page()
    {
        add_options_page(__('Atom Featured Image', 'atom_featured_image'), __('Atom Featured Image', 'atom_featured_image'), 'install_plugins', 'atom_featured_image', array($this, 'render'));
    }


    /*
    * Setup the admin page content
    * @since 1.0.0
    */
    public function configure()
    {
        // Register settings
        register_setting('atom_featured_image', 'atom_featured_image');

        // General Section
        add_settings_section('atom_featured_image_general', __('General', 'atom_featured_image'), array($this, 'render_general_section'), 'atom_featured_image');
        add_settings_field('atom_featured_image_size', __('Feed Image Size', 'atom_featured_image'), array($this, 'render_size_field'), 'atom_featured_image', 'atom_featured_image_general');
    }


    /*
    * Render the admin page
    * @since 1.0.0
    */
    public function render()
    {
        ?>
        <div class="wrap" id="atom_featured_image-admin">
            <h2><?php _e('Atom Featured Image', 'atom_featured_image'); ?></h2>
            <form action="options.php" method="POST">
                <?php settings_fields('atom_featured_image'); ?>
                <?php do_settings_sections('atom_featured_image'); ?>
                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }


    /*
    * Render admin general section
    * @since 1.0.0
    */
    public function render_general_section()
    {
        echo '<p>' . esc_html__('This Plugin adds an <icon> tag with the featured image to your atom feed.', 'atom_featured_image') . '</p>';
    }


    /*
    * Render image size option
    * @since 1.0.0
    */
    public function render_size_field()
    {
        $sizes = wp_get_registered_image_subsizes();
        $options = Options::get_instance();

        echo '<select id="atom_featured_image_size" name="atom_featured_image[image_size]">';
        foreach ($sizes as $name => $size)
        {
            printf('<option %s>%s</option>', $name == $options->get('image_size', ATOM_IMAGE_DEFAULT_SIZE) ? 'selected="selected"' : '', $name);
        }
        echo '</select>';
    }
}
