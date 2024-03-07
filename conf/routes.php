<?php
return [
	'GET /' => [
		'template' => 'start',
		'entities' => [
			'Posts' => [
				'class' => 'Post',
				'action' => 'list',
				'amount' => 5,
				'conditions' => [
					'columns' => ['column' => ['longid' => 'aktuelles']]
				],
				'order' => [['timestamp', '-']]
			],
			'Events' => [
				'class' => 'Event',
				'action' => 'list',
				'amount' => 10,
				'conditions' => [
					'timestamp' => 'today_future'
				],
				'order' => [['timestamp', '-']]
			]
		]
	],
	'GET /aktuelles/#?' => [
		'template' => 'column',
		'entities' => [
			'Column' => [
				'class' => 'Column',
				'action' => 'show',
				'identifier' => 'aktuelles',
				'identify_by' => 'longid',
			],
			'Posts' => [
				'class' => 'Post',
				'action' => 'list',
				'amount' => 10,
				'page' => '/2',
				'conditions' => [
					'columns' => ['column' => ['longid' => 'aktuelles']] 
				],
				'order' => [['timestamp', '-']],
				'pagination_url_scheme' => '/aktuelles/{page}'
			]
		]
	],
	'GET /aktuelles/*' => [
		'template' => 'post',
		'entities' => [
			'Post' => [
				'class' => 'Post',
				'action' => 'show',
				'identifier' => '/2',
				'identify_by' => 'longid',
			]
		]
	],
	'GET /a/*' => [
		'template' => 'post',
		'entities' => [
			'Post' => [
				'class' => 'Post',
				'action' => 'show',
				'identifier' => '/2',
				'identify_by' => 'id',
			]
		]
	],
	'GET /wir-vor-ort' => [
		'template' => 'vor-ort',
		'entities' => [
			'Page' => [
				'class' => 'Page',
				'action' => 'show',
				'identifier' => 'wir-vor-ort',
				'identify_by' => 'longid',
			],
			'Column' => [
				'class' => 'Post',
				'action' => 'list',
				'amount' => 3,
				'conditions' => [
					'columns' => ['column' => ['longid' => 'bezirksrat']]
				],
				'order' => [['timestamp', '-']]
			],
			'Stadtrat' => [
				'class' => 'Person',
				'action' => 'list',
				'conditions' => ['groups' => ['group' => ['longid' => 'stadtratsmitglieder']]],
			],
			'Bezirksrat' => [
				'class' => 'Person',
				'action' => 'list',
				'conditions' => ['groups' => ['group' => ['longid' => 'bezirksratsfraktion']]],
			],
			'Motion' => [
				'class' => 'Motion',
				'action' => 'list',
				'amount' => 5,
				'order' => [['timestamp', '-']]
			]
		]
	],
	'GET /bezirksrat/neuigkeiten/#?' => [
		'template' => 'column',
		'entities' => [
			'Column' => [
				'class' => 'Column',
				'action' => 'show',
				'identifier' => 'bezirksrat',
				'identify_by' => 'longid'
			],
			'Posts' => [
				'class' => 'Post',
				'action' => 'list',
				'amount' => 10,
				'page' => '/3',
				'attributes' => [
					'columns' => []
				],
				'conditions' => [
					'columns' => ['column' => ['longid' => 'bezirksrat']]
				],
				'order' => [['timestamp', '-']],
				'pagination_url_scheme' => '/bezirksrat/neuigkeiten/{page}'
			]
		]
	],
	'GET /bezirksrat/neuigkeiten/*{9,}' => [
		'template' => 'post',
		'entities' => [
			'Post' => [
				'class' => 'Post',
				'action' => 'show',
				'identifier' => '/3',
				'identify_by' => 'longid',
			]
		]
	],
	'GET /bezirksrat/antraege/#?' => [
		'template' => 'motions',
		'entities' => [
			'Motion' => [
				'class' => 'Motion',
				'action' => 'list',
				'amount' => 10,
				'page' => '/3',
				'order' => [['timestamp', '-']],
				'pagination_url_scheme' => '/bezirksrat/antraege/{page}'
			]
		]
	],
	'GET /bezirksrat/antraege/*' => [
		'template' => 'motion',
		'entities' => [
			'Motion' => [
				'class' => 'Motion',
				'action' => 'show',
				'identifier' => '/3',
				'identify_by' => 'longid',
			]
		]
	],
	'GET /ueber-uns' => [
		'template' => 'ueber-uns',
		'entities' => [
			'Page' => [
				'class' => 'Page',
				'action' => 'show',
				'identifier' => 'ueber-uns',
				'identify_by' => 'longid',
			],
			'Vorstand' => [
				'class' => 'Person',
				'action' => 'list',
				'conditions' => ['groups' => ['group' => ['longid' => 'vorstand-ov-dudweiler']]],
				// 'identifier' => 'vorstand-ov-dudweiler',
				// 'identify_by' => 'longid',
				// 'order' => [['groups.number', '+']]
			]
		]
	],
	'GET /**' => [
		'template' => 'page',
		'entities' => [
			'Page' => [
				'class' => 'Page',
				'action' => 'show',
				'identifier' => '/1',
				'identify_by' => 'longid',
			]
		]
	]
];