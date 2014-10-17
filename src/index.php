<?php
require '../vendor/autoload.php';
require 'MyAutoloader.php';

// Prepare app
$app = new \Slim\Slim(array(
    'templates.path' => '../templates',
));

// Create monolog logger and store logger in container as singleton 
// (Singleton resources retrieve the same log resource definition each time)
$app->container->singleton('log', function () {
    $log = new \Monolog\Logger('slim-skeleton');
    $log->pushHandler(new \Monolog\Handler\StreamHandler('../logs/app.log', \Monolog\Logger::DEBUG));
    return $log;
});

// Prepare view
$app->view(new \Slim\Views\Twig());
$app->view->parserOptions = array(
    'charset' => 'utf-8',
    'cache' => realpath('../templates/cache'),
    'auto_reload' => true,
    'strict_variables' => false,
    'autoescape' => true
);
$app->view->parserExtensions = array(new \Slim\Views\TwigExtension());

// Define routes
$app->get('/', function () use ($app) {
    // Sample log message
    $app->log->info("Slim-Skeleton '/' route");
    // Render index view
    $app->render('index.html');
});

// Get All Antenna
$app->get('/antenna/', function()  {
	$antennaController=new src\controller\AntennaController;
	$antennas=$antennaController->getAllAntenna();
	echo json_encode($antennas,JSON_PRETTY_PRINT);
});

// Get Antenna By Id
$app->get('/antenna/:id/:data', function($id,$data)  {
	$antennaController=new src\controller\AntennaController();
	$antennas=$antennaController->getAntennaById($id);
	echo json_encode($antennas,JSON_PRETTY_PRINT);
});

// Create Antenna
$app->post('/antenna', function() use ($app) {
	$request = $app->request();
	$body = $request->getBody();
	$input = json_decode($body);

	$antennaController = new src\controller\AntennaController();
	$antennas = $antennaController->saveAntenna($input);
	//$menus=$menuController->createMenu();
	echo print_r($input,true);
});
	

// Get All Menu
$app->get('/menu', function()  {
	$menuController=new src\controller\MenuController();
	$menus=$menuController->getAllMenu();
	echo json_encode($menus,JSON_PRETTY_PRINT);
});


// Run app
zray_disable(); // Disabilita barra ZendServer. Serve solo se si ha ZendServer

$app->run();
