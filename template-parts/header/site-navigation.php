<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>

<label for="burger" class="burger__label">Menu</label>

<section>
    <h2 class="screen-reader-text"><?php echo __('Header', 'wtp'); ?></h2>
    <nav class="">
        <h2 class="screen-reader-text"><?php echo __('Main navigation', 'wtp'); ?></h2>
        <?php
        wp_nav_menu(array(
            'theme_location'        => 'primary',
            'container'     => '',
            'fallback_cb'           => false,
            'menu_class'            => 'nav  nav--header',
            'add_li_class'          => 'nav__item',
            'add_li_active_class'   => 'nav__item--active',
            'add_a_class'           => 'nav__link',
            'add_a_active_class'    => 'nav__link--active',

            'add_li_parent_class'   => 'nav__item--parent',
            'add_submenu_class'     => 'nav--sub',
        ));
        ?>
    </nav>
</section>