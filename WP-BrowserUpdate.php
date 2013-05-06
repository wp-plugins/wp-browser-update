<?php

/*
Plugin Name: WP BrowserUpdate
Plugin URI: http://wordpress.org/extend/plugins/wp-browser-update
Description: Many internet users are surfing with out-dated browsers for several reasons (mainly because they do not know how to update). Switching to a newer browser is better in terms of security and reliability. This plugin informs your visitors to switch to a newer browser in an unobtrusive way. Just activate this plugin and you and your visitors are good to go...

Visit <a href="http://browser-update.org/" title="browser-update.org" target="_blank">browser-update.org</a> for more information.
Version: 2.0
Author: Marco Steinbrecher
Author URI: http://profiles.wordpress.org/macsteini
Min WP Version: 1.5.1
Max WP Version: 3.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if (!get_option('wp_browserupdate_browsers')) update_option('wp_browserupdate_browsers', '');
if (!get_option('wp_browserupdate_css_buorg')) update_option('wp_browserupdate_css_buorg', '');
if (!get_option('wp_browserupdate_css_buorgdiv')) update_option('wp_browserupdate_css_buorgdiv', '');
if (!get_option('wp_browserupdate_css_buorga')) update_option('wp_browserupdate_css_buorga', '');
if (!get_option('wp_browserupdate_css_buorgclose')) update_option('wp_browserupdate_css_buorgclose', '');


function wpbu_language_init() {
load_plugin_textdomain('WPBU_by_Steini', false, basename(dirname(__FILE__)).'/languages/');
}

function wpbu() {
$wpbu_vars = explode(' ', get_option('wp_browserupdate_browsers'));

$msie = $wpbu_vars[0];
$firefox = $wpbu_vars[1];
$opera = $wpbu_vars[2];
$safari = $wpbu_vars[3];

echo '<script type="text/javascript">
var $buoop = {reminder: 0, newwindow: true,'.((empty($msie) and empty($firefox) and empty($opera) and empty($safari)) ? '' : 'vs:{i:'.$msie.',f:'.$firefox.',o:'.$opera.',s:'.$safari.',n:9}').'}
$buoop.ol = window.onload;
window.onload=function(){
try {if ($buoop.ol) $buoop.ol();}catch (e) {}
var e = document.createElement("script");
e.setAttribute("type", "text/javascript");
e.setAttribute("src", "http://browser-update.org/update.js");
document.body.appendChild(e);
}
</script>';
}

function wpbu_css() {
$wpbu_css_buorg = get_option('wp_browserupdate_css_buorg');
$wpbu_css_buorgdiv = get_option('wp_browserupdate_css_buorgdiv');
$wpbu_css_buorga = get_option('wp_browserupdate_css_buorga');
$wpbu_css_buorgclose = get_option('wp_browserupdate_css_buorgclose');

if (!empty($wpbu_css_buorg) and !empty($wpbu_css_buorgdiv) and !empty($wpbu_css_buorga) and !empty($wpbu_css_buorgclose)) {
echo '<style type="text/css">';
if (!empty($wpbu_css_buorg)) echo '.buorg {'.$wpbu_css_buorg.'}';
if (!empty($wpbu_css_buorgdiv)) echo '.buorg div {'.$wpbu_css_buorgdiv.'}';
if (!empty($wpbu_css_buorga)) echo '.buorg a {'.$wpbu_css_buorga.'}';
if (!empty($wpbu_css_buorgclose)) echo '#buorgclose {'.$wpbu_css_buorgclose.'}';
echo '</style>';
}
}

function wp_browserupdate() {
add_options_page('WP BrowserUpdate '.__('Options', 'WPBU_by_Steini'), 'WP BrowserUpdate', 'manage_options', 'wp-browserupdate-administration', 'wpbu_administration');
}

function wpbu_administration() {
include('WP-BrowserUpdate-Admin.php');
}

function wpbu_settings_link($links, $file) {
$settings_link = '<a href="'.admin_url('options-general.php?page=wp-browserupdate-administration').'">'.__('Settings').'</a>';
array_unshift($links, $settings_link);
return $links;
}

add_filter('plugin_action_links', 'wpbu_settings_link', 10, 2);
add_action('plugins_loaded', 'wpbu_language_init');
add_action('wp_footer', 'wpbu');
add_action('wp_head', 'wpbu_css');
add_action('admin_menu', 'wp_browserupdate');

?>