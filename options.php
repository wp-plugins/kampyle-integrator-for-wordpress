<?php
if (function_exists('load_plugin_textdomain')) {
    load_plugin_textdomain('kampyle-integrator', 'wp-content/plugins/kampyle-integrator');
}
function kampyle_request($name, $default=null) 
{
	if (!isset($_REQUEST[$name])) return $default;
	return stripslashes_deep($_REQUEST[$name]);
}
	
function kampyle_field_checkbox($name, $label='', $tips='', $attrs='')
{
  global $options;
  echo '<th scope="row">';
  echo '<label for="options[' . $name . ']">' . $label . '</label></th>';
  echo '<td><input type="checkbox" ' . $attrs . ' name="options[' . $name . ']" value="1" ' . 
    ($options[$name]!= null?'checked':'') . '/>';
  echo ' ' . $tips;
  echo '</td>';
}

function kampyle_field_textarea($name, $label='', $tips='', $attrs='')
{
  global $options;
  
  if (strpos($attrs, 'cols') === false) $attrs .= 'cols="70"';
  if (strpos($attrs, 'rows') === false) $attrs .= 'rows="5"';
  
  echo '<th scope="row">';
  echo '<label for="options[' . $name . ']">' . $label . '</label></th>';
  echo '<td><textarea wrap="off" ' . $attrs . ' name="options[' . $name . ']">' . 
    htmlspecialchars($options[$name]) . '</textarea>';
  echo '<br /> ' . $tips;
  echo '</td>';
}	

if (isset($_POST['save']))
{
    if (!wp_verify_nonce($_POST['_wpnonce'], 'save')) die('Securety violated');
    $options = kampyle_request('options');
    update_option('kampyle', $options);
}
else 
{
    $options = get_option('kampyle');
}
?>	

<div class="wrap">

<form method="post">
<?php wp_nonce_field('save') ?>
<h2>Kampyle Integrator for WordPress</h2>

<img src="http://www.pbwebdev.com.au/blog/wp-content/uploads/2010/04/kampyle.jpg" alt="Kampyle Feedback Analytics Logo" style="float: left; margin-right: 10px;" height="48" width="100">
<p>This plugin allows for insertion of the Kampyle CSS and JavaScript into your WordPress website. <br><br>You will also need a <a href="https://www.kampyle.com/feedback-form-kampyle/?r=wordpress" title="Kampyle account signup" target="_blank">Kampyle</a> account to integrate with this plugin. <br><br>More information can be obtained from: <br>
  <a href="https://www.kampyle.com/feedback-form-kampyle/?r=wordpress" title="Kampyle account signup" target="_blank">https://www.kampyle.com/feedback-form-kampyle/?r=wordpress</a> <br>
  <br>Please also view the <a href="http://www.pbwebdev.com.au/blog/kampyle-integrator-for-wordpress.html" title="link to documentation" target="_blank">documentation</a> on our document support page.</p>

<p>Created by <a href="http://www.pbwebdev.com.au/" title="link to PB Web Development" target="_blank">PB Web Development</a>, please donate if you like this plug-in</p>

<table class="form-table">
<tr valign="top"><?php kampyle_field_textarea('head', __('head', 'kampyle-integrator'), __('head hint', 'kampyle-integrator'), 'rows="10"'); ?></tr>
<tr valign="top"><?php kampyle_field_textarea('footer', __('footer', 'kampyle-integrator'), __('footer hint', 'kampyle-integrator'), 'rows="10"'); ?></tr>
</table>

<p class="submit"><input type="submit" name="save" value="<?php _e('save', 'kampyle-integrator'); ?>"></p>

</form>
</div>
