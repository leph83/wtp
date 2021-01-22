<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}



function wtp_cookie_expire($time)
{
    return 0;
}
add_filter('post_password_expires', 'wtp_cookie_expire');
