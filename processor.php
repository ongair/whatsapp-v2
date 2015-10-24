<?php

  require 'vendor/autoload.php';

  class ConnectorJob {
    public function perform() {
      echo $this->args['name'];
    }
  }

  Resque::setBackend('localhost:6379');
  $args = array(
    'name' => 'Chris'
  );
  Resque::enqueue('default', 'ConnectorJob', $args);