<?php

use Api\Router\Router;

Router::get("/","HomeController@index");
Router::get("/projects/getbyid/","ProjectController@getbyid");