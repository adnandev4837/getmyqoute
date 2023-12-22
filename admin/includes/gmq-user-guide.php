<?php
/**
 * WWE Small User Guide
 * 
 * @package     WWE Small Quotes
 * @author      Eniture-Technology
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Html Div For User Guide Tab
 */
?>
<div class="user_guide">
    <h3>These are are the following guidlines for usage of this plugin.Please Read carefully and setup your plugin setting.</h3>
    <p>Use shortcode <code>[getqoute]</code> for frontend form.</p>
    <p>The purpose of this plugin is to provide ease in booking from qoutations and this plugin has fields that used for the calculation of qoutation on the basis mapbox api distance and this distance is traffic driving distance and if in any case apis not work than calculate the qoutation on the basis of user distance.</p>
    <p>
    In this plugin can customize labels,styles,options,map settings and emails ettings easly from wordpress admin.
</p>
<h3>Connection Settings</h3>
<p> If you want to calculate distance with mapbox api than have to set the token from <a href="?page=getmyqoute_plugin">here</a> and if you set wrong token than it may effect at frontend so you can delete token from <a href="?page=getmyqoute_plugin">here</a> and then fronend run smothly and if you don't have key to calculate your qoutes distance than your distance will be the user distance and qouts on the basis of that.And for apis you have to avil mapbox access token and that token you can create from <a href="https://account.mapbox.com/access-tokens/">here</a> after signing in to mapbox.
</p>
<h3>Label Settings</h3>
<p>
  If you want to change input fields, button, checkbox or top labels than change from <a href="?page=label_settings">here</a> and these label cahnge placeholder also so be carefull and by defualt label is set if did't set any field aur leave empty.  
</p>
<h3>Map Settings</h3>
<p>
  In map metting tab you can set distance rate that directly multipy to your calculated distance(rate*Calculated distance) and you can also set unit for distance calculation and be carefull in case of unit because it drectly effect on your qoutation calcalution and you can set this set from <a href="?page=map_settings">here</a>.
</p>
<h3>Dropdown Settings</h3>
<p>
In this tab you can set options and one row means one options in that row you can set option name that show on front and option value that also needs forsetting option and third field is opion rate in which you can set rate for that option and this rate also included in calculation.And you can append options as you can from top button "click to add option".You can access this tab from <a href="?page=dropdown_settings">here</a>.
</p>
<h3>Email Settings</h3>
<p>
In this tab you can set email that is your mail on which you can recieve user qoutation mail and you can also set cc and bcc that mens copy of that qoutation and bcc mens also copy but mail not included in header and at last you can subject for header.You can access this tab from <a href="?page=email_settings">here</a>.
</p>
<h3>Style Customization</h3>
<p>
In this tab you set color font sizes and margins for your fronend fields,labels and buttons.You can access this tab from <a href="?page=style_customization">here</a>.
</p>
        </div>