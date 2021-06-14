<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>

<?php
wp_nav_menu(array(
    'theme_location'        => 'footer',
    'container'             => '',
    'menu_class'            => 'nav  nav--footer',
    'fallback_cb'           => false,
    
    'add_li_class'          => 'nav__item',
    'add_li_active_class'   => 'nav__item--active',
    'add_li_parent_class'   => 'nav__item--parent',
    'add_a_class'           => 'nav__link',
    'add_a_active_class'    => 'nav__link--active',
    'add_submenu_class'     => 'nav__submenu',
));
?>