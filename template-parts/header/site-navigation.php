<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>


<nav class="">
<h2 class="screen-reader-text"><?php echo __('main navigation', 'wtp-child'); ?></h2>
<?php
wp_nav_menu(array(
    'theme_location'        => 'primary',
    'menu_class'            => 'flex  flex-wrap--wrap  flex-justify--space-between  list-style-type--none  margin--0  padding--0',
    'fallback_cb'           => false,
    'add_submenu_class'     => '',
    'add_li_class'          => '',
    'add_li_active_class'   => '',
    'add_li_parent_class'   => '',
    'add_a_class'           => 'display--block  text-decoration--none  color--inherit  padding--half',
    'add_a_active_class'    => 'color--2',
));
?>
</nav>