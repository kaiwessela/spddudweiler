<?php
namespace Blog\Config;

class Routes {
	const ROUTES = [
		[
			'path' => '/^\/$/',
			'template' => 'index',
			'controllers' => [
				'PostListController' => [
					'limit' => 5,
					'offset' => 0
				],
				'EventListController' => []
			]
		],
		[
			'path' => '/^aktuelles\/[0-9]{0,8}$/',
			'template' => 'posts',
			'controllers' => [
				'PostListController' => []
			]
		],
		[
			'path' => '/^aktuelles\/.{9,}$/',
			'template' => 'post',
			'controllers' => [
				'PostController' => []
			]
		],
		[
			'path' => '/^a\/.{8}$/',
			'template' => 'post',
			'controller' => [
				'PostController' => []
			]
		]
	];

	const STATIC_ROUTE = [
		'template' => 'static',
		'controllers' => [
			'StaticController' => []
		]
	];

	const TITLES = [
		'ueber-uns' => 'Über uns',
		'vor-ort' => 'Wir vor Ort',
		'mitmachen' => 'Mitmachen'
	];
}
?>
