<?php

if (isset($_POST['wpbu_submit'])) {
update_option('wp_browserupdate_browsers', $_POST['wpbu_msie'].' '.$_POST['wpbu_firefox'].' '.$_POST['wpbu_opera'].' '.$_POST['wpbu_safari']);
update_option('wp_browserupdate_css_buorg', $_POST['wpbu_css_buorg']);
update_option('wp_browserupdate_css_buorgdiv', $_POST['wpbu_css_buorgdiv']);
update_option('wp_browserupdate_css_buorga', $_POST['wpbu_css_buorga']);
update_option('wp_browserupdate_css_buorgclose', $_POST['wpbu_css_buorgclose']);
echo '<div class="updated"><p><strong>'.__('Options saved.', 'WPBU_by_Steini').'</strong></p></div>';
unset($_POST['wpbu_submit']);
}

$wpbu_vars = explode(' ', get_option('wp_browserupdate_browsers'));
$msie = $wpbu_vars[0];
$firefox = $wpbu_vars[1];
$opera = $wpbu_vars[2];
$safari = $wpbu_vars[3];

$wpbu_css_buorg = get_option('wp_browserupdate_css_buorg');
$wpbu_css_buorgdiv = get_option('wp_browserupdate_css_buorgdiv');
$wpbu_css_buorga = get_option('wp_browserupdate_css_buorga');
$wpbu_css_buorgclose = get_option('wp_browserupdate_css_buorgclose');

$msie_vers	= array(9, 8, 7, 6);
$firefox_vers	= array(19, 18, 17, 16);
$opera_vers	= array(11, '10.6', '10.5', '10.1');
$safari_vers	= array(5, 4, 3, 2);

echo '<div class="wrap"><form action="'.$_SERVER['REQUEST_URI'].'" method="post"><h2>WP BrowserUpdate '.__('Options', 'WPBU_by_Steini').'</h2><h3>'.__('Out-dated Browsers', 'WPBU_by_Steini').'</h3><p>'.__('Please choose from the following browser versions which one (includes all versions below) you consider to be out-dated... If you do not change and save the options at all, WP BrowserUpdate uses the default values.', 'WPBU_by_Steini').'</p><p>Microsoft Internet Explorer: <select name="wpbu_msie">';

for ($x=0; $x<count($msie_vers); $x++) echo '<option value="'.$msie_vers[$x].'"'.($msie==$msie_vers[$x] ? ' selected="selected"' : '').'>'.$msie_vers[$x].'</option>';

echo '</select></p><p>Mozilla Firefox: <select name="wpbu_firefox">';

for ($x=0; $x<count($firefox_vers); $x++) echo '<option value="'.$firefox_vers[$x].'"'.($firefox==$firefox_vers[$x] ? ' selected="selected"' : '').'>'.$firefox_vers[$x].'</option>';

echo '</select></p><p>Opera: <select name="wpbu_opera">';

for ($x=0; $x<count($opera_vers); $x++) echo '<option value="'.$opera_vers[$x].'"'.($opera==$opera_vers[$x] ? ' selected="selected"' : '').'>'.$opera_vers[$x].'</option>';

echo '</select></p><p>Apple Safari: <select name="wpbu_safari">';

for ($x=0; $x<count($safari_vers); $x++) echo '<option value="'.$safari_vers[$x].'"'.($safari==$safari_vers[$x] ? ' selected="selected"' : '').'>'.$safari_vers[$x].'</option>';

echo '</select></p>

<h3>WP BrowserUpdate '.__('CSS Styles', 'WPBU_by_Steini').'</h3>
<p>'.__('If you do not know about CSS and how to use, leave the following forms empty. For further details, visit the <a href="http://browser-update.org/customize.html" target="_blank">how-to page</a>.', 'WPBU_by_Steini').'</p>
<p>.buorg '.__('Style', 'WPBU_by_Steini').':<br /><textarea name="wpbu_css_buorg" cols="40" rows="10">'.$wpbu_css_buorg.'</textarea></p>
<p>.buorg div '.__('Style', 'WPBU_by_Steini').':<br /><textarea name="wpbu_css_buorgdiv" cols="40" rows="2">'.$wpbu_css_buorgdiv.'</textarea></p>
<p>.buorg a '.__('Style', 'WPBU_by_Steini').':<br /><textarea name="wpbu_css_buorga" cols="40" rows="2">'.$wpbu_css_buorga.'</textarea></p>
<p>#buorgclose '.__('Style', 'WPBU_by_Steini').':<br /><textarea name="wpbu_css_buorgclose" cols="40" rows="10">'.$wpbu_css_buorgclose.'</textarea></p>

<p class="submit"><input type="submit" name="wpbu_submit" value="'.__('Update Options', 'WPBU_by_Steini').'" /></p></form></div>';

?>