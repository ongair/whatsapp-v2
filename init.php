<?php

  require 'vendor/autoload.php';
  Requests::register_autoloader();
  
  require_once 'client.php';
  require_once 'worker.php';
  require_once 'util.php';

  // load environment variables
  $dotenv = new Dotenv\Dotenv(__DIR__);
  $dotenv->load();

  // initialize database connectivity
  ActiveRecord\Config::initialize(function($cfg)
  {
    $cfg->set_model_directory('models');
    $cfg->set_connections(
      array(
        getenv('env') => getenv('db'),
       )
     );
    $cfg->set_default_connection(getenv('env'));
});