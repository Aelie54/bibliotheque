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

//en cours seul show et delete fonctionne pour les notes. mais je n'arrive pas à adde sous un book...
$router->get('/modifynote/:id', 'App\Controller\NoteController@modify');
$router->post('/modifynote/:id', 'App\Controller\NoteController@modify');

$router->get('/deletenote/:id', 'App\Controller\BookController@delete');


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
