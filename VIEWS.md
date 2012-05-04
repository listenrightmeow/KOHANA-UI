# Modules/list view module helpers

Most web content is numerable, belonging to some sort of list element. list.php is a flexible view util to pass data to in a constructable fashion remaining fully flexible.

Iterate over data ($items), define list markup and assign wrapping markup for $item with render

```
echo View::factory('modules/list', array(
	'items' => array( 
		'item.one' => array(
			'id' => 'one'
		),
		'item.two' => array(
			'class' => 'two'
		),
		'item.three' => array(
			'data-count' => 'three'
		),
	),
	'list_type' => 'dl',
	'list_id' => 'id',
	'list_class' => 'class',
	'render' => array(
		'path' => 'modules/anchor',
		'options' => array(
			'type' => 'p',
			'base' => 's3',
			'attributes' => array(
				'data-href' => '#'
			),
		),		
	)
))->render();
```

The above example will render assuming items are mapped to data

```
<dl class='class' id='id'>
	<dd id="one">
		<a data-href='#' href='http://path.to.s3.config.path/item.one'>item.one</a>
	</dd>
	<dd class="two">
		<a data-href='#' href='http://path.to.s3.config.path/item.two'>item.three</a>
	</dd>
	<dd data-count="three">
		<a data-href='#' href='http://path.to.s3.config.path/item.three'>item.three</a>
	</dd>
</dl>
```

Contents of anchor.php

```
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
```