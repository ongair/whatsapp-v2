<?php
  
  use Analog\Handler\File;

  function initLogger($account) {
    $env = getenv('env');
    $log_file = 'log/'.$account.'.'.$env.'.log';

    Analog::handler (Analog\Handler\File::init ($log_file));
    Analog::handler (Analog\Handler\Stderr::init ());
  }

  function l($message) {
    Analog::log($message);
  }