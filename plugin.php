<?php
/*
Plugin Name: Kampyle Integrator
Plugin URI: http://www.pbwebdev.com.au/blog/kampyle-integrator-for-wordpress.html
Description: This plugin allows for insertion of the Kampyle CSS and JavaScript into your WordPress website. <br><br>You will also need a <a href="https://www.kampyle.com/feedback-form-kampyle/?r=wordpress" title="Kampyle account signup" target="_blank">Kampyle</a> account to integrate with this plugin. Please also view the <a href="http://www.pbwebdev.com.au/blog/kampyle-integrator-for-wordpress.html" title="link to documentation" target="_blank">documentation</a> on our document support page.</p>
Version: 1.0
Author: Peter Bui
Author URI: http://www.pbwebdev.com.au
Disclaimer: Use at your own risk. No warranty expressed or implied is provided.
*/

/*	Copyright 2008-2010  Satollo  (email : peter@pbwebdev.com.au)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

$kampyle_options = get_option('kampyle');

add_action('admin_menu', 'kampyle_admin_menu');
function kampyle_admin_menu()
{
    add_options_page('Kampyle Integrator', 'Kampyle Integrator', 'manage_options', 'kampyle-integrator-for-wordpress/options.php');
}

add_action('wp_head', 'kampyle_wp_head');
function kampyle_wp_head()
{
    global $kampyle_options;
    
    if (is_home()) echo $kampyle_options['head_home'];
    
    echo $kampyle_options['head'];
}

add_action('wp_footer', 'kampyle_wp_footer');
function kampyle_wp_footer()
{
    global $kampyle_options;
    
    echo $kampyle_options['footer'];
}
?>
