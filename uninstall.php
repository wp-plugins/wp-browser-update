<?php

if (!defined('WP_UNINSTALL_PLUGIN')) exit();
delete_option('wp_browserupdate_browsers');
delete_option('wp_browserupdate_css_buorg');
delete_option('wp_browserupdate_css_buorgdiv');
delete_option('wp_browserupdate_css_buorga');
delete_option('wp_browserupdate_css_buorgclose');

?>