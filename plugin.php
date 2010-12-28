<?php
/*
Plugin Name: crazyegg Integrator
Plugin URI: http://www.pbwebdev.com.au/blog/crazyegg-integrator-for-wordpress
Description: This plugin allows for insertion of the crazyegg CSS and JavaScript into your WordPress website. <br><br>You will also need a <a href="https://www.crazyegg.com/" title="crazyegg account signup" target="_blank">crazyegg</a> account to integrate with this plugin. Please also view the <a href="http://www.pbwebdev.com.au/blog/crazyegg-integrator-for-wordpress" title="link to documentation" target="_blank">documentation</a> on our document support page.</p>
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

$crazyegg_options = get_option('crazyegg');

add_action('admin_menu', 'crazyegg_admin_menu');
function crazyegg_admin_menu()
{
    add_options_page('crazyegg Integrator', 'crazyegg Integrator', 'manage_options', 'crazyegg-integrator-for-wordpress/options.php');
}

add_action('wp_footer', 'crazyegg_wp_footer');
function crazyegg_wp_footer()
{
    global $crazyegg_options;
    
    echo $crazyegg_options['footer'];
}
?>
