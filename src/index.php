<?php
require '../vendor/autoload.php';
require 'MyAutoloader.php';
// $path='/Users/matteo/work/workspace/h3g/slim-skel/src/';
// require_once $path.'controller/AntennaController.php';
// require_once $path.'controller/Utils.php';
// require_once $path.'dao/AntennaDao.php';

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

// Api example
$app->get('/antenna/', function()  {
	$antennaController=new src\controller\AntennaController;
	$antennas=$antennaController->getAllAntenna();
	echo json_encode($antennas,JSON_PRETTY_PRINT);
});

// Api example
$app->get('/antenna/:id', function($id)  {
	$antennaController=new src\controller\AntennaController();
	$antennas=$antennaController->getAntennaById($id);
	echo json_encode($antennas,JSON_PRETTY_PRINT);
});

// Run app
$app->run();
