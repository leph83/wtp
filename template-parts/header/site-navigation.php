<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>

<section>
    <h2 class="screen-reader-text"><?php echo __('Header', 'wtp'); ?></h2>
    <nav class="">
        <h2 class="screen-reader-text"><?php echo __('Main navigation', 'wtp'); ?></h2>
        <?php
        wp_nav_menu(array(
            'theme_location'        => 'primary',
            'container'     => '',
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
    </nav>
</section>