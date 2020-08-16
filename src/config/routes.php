<?php
namespace Blog\Config;

class Routes {
	const ROUTES = [
		[
			'path' => '/^\/$/',
			'template' => 'index',
			'controller' => 'IndexController'
		],
		[
			'path' => '/^aktuelles\/[0-9]{0,8}$/',
			'template' => 'posts',
			'controller' => 'PostListController'
		],
		[
			'path' => '/^aktuelles\/.{9,}$/',
			'template' => 'post',
			'controller' => 'PostController'
		],
		[
			'path' => '/^a\/.{8}$/',
			'template' => 'post',
			'controller' => 'PostController'
		]
	];

	const DEFAULT_ROUTE = [
		'template' => 'default',
		'controller' => 'Controller'
	];

	const TITLES = [
		'ueber-uns' => 'Über uns',
		'vor-ort' => 'Wir vor Ort',
		'mitmachen' => 'Mitmachen'
	];
}
?>
