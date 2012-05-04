# UI Module

## Load UI module. Add to Kohana::modules
```
'ui'  => MODPATH.'ui',  // Load custom UI module
```

## UI::masher : load page or group specific assets in a defined location
```
UI::masher($location, $type, $page);

// Print out css assets for the header in any group you create within the masher config
echo UI::masher('header', 'css', 'global');

// Pass a page location from your controller for automated loading
echo UI::masher('header', 'css', $page);
```

## UI::masher config {application name}/application/config/masher.php
```
return array(
	'global' => array(
		'css' => array(
			'public/ui/css/common/reset.css',
			'public/ui/css/common/layout.css',
			'public/ui/css/typography/typography.css',
		),
		'js' => array(
			'public/ui/javascript/external/jquery.min.js',
			'public/ui/javascript/external/fidel.min.js',
			'public/ui/javascript/external/requirejs.min.js',
		),
	),
	'page/index' => array(
		'css' => array(
			'public/ui/css/page/index.css',
		),
		'js' => array(
			'public/ui/javascript/page/index.js',
		),
	),
);
```

## UI:link : return content wrapping anchor with customizable uri

UI::link($base, $content, $attributes);

Pass 'null' in place of $base to return relative path uri

```
UI::link(
	'base',
	UI::img('/common/logo.png', null, array('alt' => 'logo')),
	array( 'id' => 'logo', 'href' => '/', 'alt' => 'logo' )
);

<a id="logo" href="/" alt="logo">
	<img src="http://path.to.base.uri/common/logo.png" alt="logo"/>
</a>
```

## UI:text : create flexible text elements on the fly

UI::text($content, $type, $attributes)

```
echo UI::text($messages['footer.copyright'], 'p', array( 'id' => 'copyright' )); 

<p id="copyright">copyright message</p>
```

## UI::img($uri, $base, $attributes)

UI::img($uri, $base = null, $attributes = null)

Create a relative path image

```
UI::img('/common/logo.png', null, array('alt' => $messages['site.title'])

<img src="/common/logo.png" alt="site title"/>
```

Create an absolute path image (create defaults.php in application/config)

```
UI::img('/common/logo.png', 'base', array('alt' => $messages['site.title'])

<img src="http://path.to.base.uri/common/logo.png" alt="site title"/>
```