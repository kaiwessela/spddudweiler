<?php

require_once __DIR__ . '/Octopus/Octopus/autoloader.php';
require_once __DIR__ . '/Blog/Blog/autoloader.php';
// require_once __DIR__ . '/BlogLegacy/autoloader.php';
require_once __DIR__ . '/ParsedownForBlog/autoloader.php';


$endpoint = new \Octopus\Core\Controller\Endpoint([
	'config' => '{ENDPOINT_DIR}/conf/config.php',
	'modules' => '{ENDPOINT_DIR}/conf/modules.php',
	'routes' => '{ENDPOINT_DIR}/conf/routes.php',
	'template_dir' => '{ENDPOINT_DIR}/templates'
]);

$endpoint->execute();

// if($endpoint->response->code == 404){
// 	$endpoint->template = '404';
// } else if($endpoint->response->code >= 400){
// 	$endpoint->template = 'error';
// }

// $endpoint->send();