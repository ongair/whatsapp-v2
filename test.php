<?php

  require_once 'init.php';

  initLogger($argv[1]);

  $client = new Client($argv[1]);
  $client->loop();