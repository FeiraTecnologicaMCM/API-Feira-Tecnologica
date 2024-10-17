<?php

use Api\Router\Router;

Router::get("/","HomeController@index");
Router::get("/projects/","ProjectController@index");
Router::get("/projects/get/","ProjectController@get");
Router::get("/projects/getbyid/","ProjectController@getbyid");
Router::get("/projects/getbyods/","ProjectController@getbyods");
Router::get("/projects/getbyname/","ProjectController@getbyname");
Router::get("/projects/getbyclass/","ProjectController@getbyclass");
Router::get("/projects/getbyperiodo/","ProjectController@getbyperiodo");
Router::get("/projects/getbycourse/","ProjectController@getbycourse");
Router::get("/votos/contagem/","VotosController@projetoMaisVotado");
Router::post("/votos/registrar/", "VotosController@registrarVoto");
