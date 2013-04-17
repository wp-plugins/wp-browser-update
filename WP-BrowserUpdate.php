<?php

/*
Plugin Name: WP BrowserUpdate
Plugin URI:
Description: Many internet users are surfing with out-dated browsers for several reasons (mainly because they do not know how to update). Switching to a newer browser is better in terms of security and reliability. This plugin informs your visitors to switch to a newer browser in an unobtrusive way. Just activate this plugin and you and your visitors are good to go...

Visit <a href="http://browser-update.org/" title="browser-update.org" target="_blank">browser-update.org</a> for more information.
Version: 1.0
Author: Marco Steinbrecher
Author URI: http://profiles.wordpress.org/macsteini
Min WP Version: 1.5.1
Max WP Version: 3.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

function Steinis_BrowserUpdate() {
echo '<script type="text/javascript">
var $buoop = {}
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

add_action('wp_footer', 'Steinis_BrowserUpdate');

?>