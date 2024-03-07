<?php
return [
	'controllers' => [
		'BasicEntityController' => '\Octopus\Modules\BasicEntityController\BasicEntityController',
		'AstronauthController' => '\Octopus\Modules\Astronauth\AstronauthController'
	],
	'entities' => [
		'Event' 		=> '\Blog\Modules\Events\Event',
		'Application' 	=> '\Blog\Modules\Media\Application',
		'Audio' 		=> '\Blog\Modules\Media\Audio',
		'Image' 		=> '\Blog\Modules\Media\Image',
		'Video' 		=> '\Blog\Modules\Media\Video',
		'Motion' 		=> '\Blog\Modules\Motions\Motion',
		'Page' 			=> '\Blog\Modules\Pages\Page',
		'Person' 		=> '\Blog\Modules\Persons\Person',
		'Group' 		=> '\Blog\Modules\Persons\Group',
		'Post' 			=> '\Blog\Modules\Posts\Post',
		'Column' 		=> '\Blog\Modules\Posts\Column'
	],
	'default_entity_controllers' => [
		'@all' => 'BasicEntityController'
	]
];