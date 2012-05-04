<?php defined('SYSPATH') or die('No direct access allowed.'); 
	/* START - HEADER PARTIAL */
	echo View::factory('partials/header', array(
		'page' => $page,
		'links' => $links,
		'messages' => $messages,
	))->render();
	/* END - HEADER PARTIAL */
	/* START - PAGE SPECIFIC PARTIAL */
	echo View::factory($page, array(
		'page' => $page,
	))->render();
	/* END - PAGE SPECIFIC PARTIAL */
	/* START - FOOTER PARTIAL */
	echo View::factory('partials/footer', array(
		'page' => $page,		
		'links' => $links,
		'messages' => $messages,
	))->render();
	/* END - FOOTER PARTIAL */	
?>	