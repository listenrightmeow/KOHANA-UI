<?php defined('SYSPATH') or die('No direct script access.');

abstract class Kohana_UI {
  /**
  * Return assets from Masher config. Utilize 3.0 helpers (http://kohanaframework.org/3.0/guide/api/HTML)
  * 
  * // Call position or type specific assets
  * UI::masher('footer', 'js', $page);
  *
  * @author  Michael Dyer
  * @param   string string : location, type, page
  * @return  Kohana_Ui
  * @throws  None
  */
  public static function masher($location, $type, $page)
  {
	$assets = array(
	  'header' => array(
		'css' => array(),
		'js' => array(),
		'str' => '',
	  ),
	  'footer' => array(
		'css' => array(),
		'js' => array(),
		'str' => '',
	  ),
	);
	$masher = Kohana::$config->load('masher');
	array_push($assets[$location][$type], $masher[$page][$type]);

	foreach ($assets[$location][$type][0] as $key => $asset) {
	  $assets[$location]['str'] .= ($type == 'css') ? HTML::style($asset) : HTML::script($asset);
	}

	return $assets[$location]['str'];
  }
  /**
  * Return CDN paths for anchor medium
  * 
  * // Link will return a full URI protocol mapped to defaults.config
  * UI::link($base, $content, $attributes);
  *
  * @author  Michael Dyer
  * @param   string string array : base, content, attributes
  * @return  Kohana_Ui
  * @throws  None
  */
  public static function link($base, $content, $attributes)
  {
	if(!isset($attributes)) exit;
	$defaults = Kohana::$config->load('defaults');
	if(isset($base)) {
	  $attributes['href'] = $defaults['paths'][$base].$attributes['href'];
	}
	return '<a'.HTML::attributes($attributes).'>'.$content.'</a>';
  }
  /**
  * Return dynamic text wrapper
  * 
  * // Text will wrap content in $type tags
  * UI::text($content, $type, $attributes);
  *
  * @author  Michael Dyer
  * @param   string string array : content, null, null
  * @return  Kohana_Ui
  * @throws  None
  */
  public static function text($content, $type = null, $attributes = null)
  {
	if(!isset($type)) $type = 'span';
	return '<'.$type.HTML::attributes($attributes).'>'.$content.'</'.$type.'>';
  }
  /**
  * Return CDN paths for image medium
  * 
  * // Link will return a full URI protocol mapped to defaults.config
  * UI::image($base, $content, $attributes);
  *
  * @author  Michael Dyer
  * @param   string string array : base, content, attributes
  * @return  Kohana_Ui
  * @throws  None
  */
  public static function img($uri, $base = null, $attributes = null)
  {
	if(!isset($uri)) exit;
	$defaults = Kohana::$config->load('defaults');
	if(!isset($base)){
	  $base = 'cdn';
	}
	$uri = $defaults['paths'][$base].$uri;
	return HTML::image($uri, $attributes);
  } 
}
// END KOHANA UI