<?php defined('SYSPATH') or die('No direct access allowed.');
/*
* Author : Mike Dyer
* @Anchor.php
* 
* @params : 
*	item : content
*	options : valid html attributes
*
*/
if(!isset($item) && !empty($item)) exit;
$links = I18n::load('en-links');
$messages = I18n::load('en-us');

$base = isset($attributes['base']) ? $attributes['base'] : null;
$attributes = isset($attributes['attributes']) ? $attributes['attributes'] : null;
$attributes['href'] = $links[$item];

echo UI::link($base, $messages[$item], $attributes);
?>