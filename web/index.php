<?php 

// Require dependendies
require_once __DIR__.'/../vendor/autoload.php';

// Init Silex
$app = new Silex\Application();
$app['debug'] = true;

// Services
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

// Create routes
$app->get('/', function() use ($app)
{
    return 'Home!';
});

// Run Silex - Toujours à la fin

$app->run();