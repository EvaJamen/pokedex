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
$app
    ->get('/', function() use ($app)
    {
        return 'Home!';
    })
    ->bind('home');

$app
    ->get('/pokemons', function() use ($app)
    {
        return 'Pokemons!';
    })
    ->bind('pokemons');

//faire attention à l'id dans l'URL
$app
    ->get('/pokemon/{id}', function($id) use ($app)
    {
        return 'Pokemon: '.$id.'!';
    })
    ->assert('id', '\d+')
    ->bind('pokemon');

$app
    ->get('/add', function() use ($app)
    {
        return 'Add!';
    })
    ->bind('add');

// Run Silex - Toujours à la fin
$app->run();