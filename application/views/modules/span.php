<?php defined('SYSPATH') or die('No direct access allowed.');
/*
* Author : Mike Dyer
* @Span.php
* 
* @params : 
*	item : content
*	options : valid html attributes
*
*/
if(!isset($item) && !empty($item)) exit;
$messages = I18n::load('en-us');

$type = isset($attributes['type']) ? $attributes['type'] : null;
$attributes = isset($attributes['attributes']) ? $attributes['attributes'] : null;

echo UI::text($messages[$item], $type, $attributes);
?>