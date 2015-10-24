<?php
  
  require 'vendor/autoload.php';
  require_once 'init.php';

  if (count($argv) == 2) {
    $account = $argv[1];
    Client::schedule($argv[1]);
  }
  else
    echo "Usage: php scheduler.php 1234567890".PHP_EOL;