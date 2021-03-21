<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>

<?php
wp_nav_menu(array(
    'theme_location'        => 'footer',
    'container'             => '',
    'menu_class'            => '',
    'fallback_cb'           => false,
    'add_submenu_class'     => '',
    'add_li_class'          => '',
    'add_li_active_class'   => '',
    'add_li_parent_class'   => '',
    'add_a_class'           => '',
    'add_a_active_class'    => '',
));
?>