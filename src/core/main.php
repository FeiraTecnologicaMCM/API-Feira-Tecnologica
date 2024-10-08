<?php

use Api\Router\Router;

Router::get("/","HomeController@index");
Router::get("/projects/","ProjectController@index");
Router::get("/projects/get/","ProjectController@get");
Router::get("/projects/getbyid/","ProjectController@getbyid");