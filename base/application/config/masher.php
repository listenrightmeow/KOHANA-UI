<?php defined('SYSPATH') or die('No direct access allowed.');
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