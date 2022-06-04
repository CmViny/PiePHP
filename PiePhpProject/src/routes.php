<?php
use Core\Router;

Router::connect ('/', ['controller' => 'app', 'action' => 'index']) ; // 
Router::connect ('/register', ['controller' => 'user', 'action' => 'add']) ; // Affiche layout register
Router::connect ('/action', ['controller' => 'user', 'action' => 'register']) ; // Method save (UserModel)
Router::connect ('/login', ['controller' => 'user', 'action' => 'connect']) ; // Affiche layout login
Router::connect ('/show', ['controller' => 'user', 'action' => 'show']) ; // Affiche layout show
Router::connect ('/connectLogin', ['controller' => 'user', 'action' => 'login']) ; // Method getUser (UserModel)

Router::connect ('/avancer/{name}', ['controller' => 'user', 'action' => 'avancer']) ; 
Router::connect ('/avancer', ['controller' => 'user', 'action' => 'avancer']) ; 

