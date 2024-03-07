<?php
return [
	'/' => [
		'template' => 'start',
		'objects' => [
			'Column' => [
				'action' => 'show',
				'identifier' => 'aktuelles',
				'amount' => 5
			],
			'Event' => [
				'action' => 'list',
				'amount' => 10,
				'options' => [
					'future'
				]
			]
		]
	],
	'aktuelles/#?' => [
		'template' => 'column',
		'objects' => [
			'Column' => [
				'action' => 'show',
				'identifier' => 'aktuelles',
				'amount' => 10,
				'page' => '/2',
				'options' => [
					'pagination' => 'aktuelles/{page}'
				]
			]
		]
	],
	'aktuelles/*{9,}' => [
		'template' => 'post',
		'objects' => [
			'Post' => [
				'action' => 'show',
				'identifier' => '/2'
			]
		]
	],
	'a/*{8}' => [
		'template' => 'post',
		'objects' => [
			'Post' => [
				'action' => 'show',
				'identifier' => '/2'
			]
		]
	],
	'wir-vor-ort' => [
		'template' => 'vor-ort',
		'objects' => [
			'Page' => [
				'action' => 'show',
				'identifier' => 'wir-vor-ort',
			],
			'Column' => [
				'action' => 'show',
				'identifier' => 'bezirksrat',
				'amount' => 3
			],
			'Group' => [ // TODO reorganize alias/as
				'as' => 'Stadtrat',
				'action' => 'show',
				'identifier' => 'stadtratsmitglieder'
			],
			'groups' => [
				'as' => 'Bezirksrat',
				'action' => 'show',
				'identifier' => 'bezirksratsfraktion'
			],
			'Motion' => [
				'action' => 'list',
				'amount' => 5
			]
		]
	],
	'bezirksrat/neuigkeiten/#?' => [
		'template' => 'column',
		'objects' => [
			'Column' => [
				'action' => 'show',
				'identifier' => 'bezirksrat',
				'amount' => 10,
				'page' => '/3',
				'options' => [
					'pagination' => 'bezirksrat/neuigkeiten/{page}'
				]
			]
		]
	],
	'bezirksrat/neuigkeiten/*{9,}' => [
		'template' => 'post',
		'objects' => [
			'Post' => [
				'action' => 'show',
				'identifier' => '/3'
			]
		]
	],
	'bezirksrat/antraege/#?' => [
		'template' => 'motions',
		'objects' => [
			'Motion' => [
				'action' => 'list',
				'amount' => 10,
				'page' => '/3',
				'options' => [
					'pagination' => 'bezirksrat/antraege/{page}'
				]
			]
		]
	],
	'bezirksrat/antraege/*{9,}' => [
		'template' => 'motion',
		'objects' => [
			'Motion' => [
				'action' => 'show',
				'identifier' => '/3'
			]
		]
	],
	'ueber-uns' => [
		'template' => 'ueber-uns',
		'objects' => [
			'Page' => [
				'action' => 'show',
				'identifier' => 'ueber-uns'
			],
			'Group' => [
				'as' => 'Vorstand',
				'action' => 'show',
				'identifier' => 'vorstand-ov-dudweiler',
				'amount' => null
			],
			'groups' => [
				'as' => 'Jusos',
				'action' => 'show',
				'identifier' => 'jusos-dudweiler',
				'amount' => null
			]
		]
	],
	'?' => [
		'template' => 'page',
		'objects' => [
			'Page' => [
				'action' => 'show',
				'identifier' => '/1'
			]
		]
	]
];
?>
