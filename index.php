<?php

namespace App;

require_once('vendor/autoload.php');

use Router\Router;
$router = new Router($_GET['url']);


$router->get("/", "App\Controller\AppController@index");

//affiche le book avec id 1 : fonctionne ! 
$router->get('/article/:id', 'App\Controller\BookController@show');

//pour ajouter un book : fonctionne !
$router->get('/addarticle', 'App\Controller\BookController@add');
$router->post('/addarticle', 'App\Controller\BookController@add');

//en cours
$router->get('/modifyarticle/:id', 'App\Controller\BookController@modify');
$router->post('/modifyarticle/:id', 'App\Controller\BookController@modify');

$router->get('/deletearticle/:id', 'App\Controller\BookController@delete');


// //montrer commentaire
// $router->get('/commentaire/:id', 'App\Controller\CommentaireController@show');
// //ajouter commentaire
// $router->get('/addcommentaire', 'App\Controller\CommentaireController@add');
// $router->post('/addcommentaire', 'App\Controller\CommentaireController@add');
// //modifier commentaire
// $router->get('/modifycommentaire/:id', 'App\Controller\CommentaireeController@modify');
// $router->post('/modifycommentaireid', 'App\Controller\CommentaireController@modify');
// //supprimer commentaire
// $router->get('/deletecommentaire/:id', 'App\Controller\CommentaireController@delete');

$router->run();
