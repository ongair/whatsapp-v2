<?php

  require 'vendor/autoload.php';
  require_once 'client.php';
  require_once 'worker.php';

  use Analog\Analog;

  $dotenv = new Dotenv\Dotenv(__DIR__);
  $dotenv->load();