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

  function postToServer($location, $data) {
    $url = getenv('url').$location;

    l("Posting to $location");
    $headers = array('Content-Type' => 'application/json', 'Accept' => 'application/json');
    Requests::post($url, $headers, json_encode($data), array('timeout' => 5000));
  }

  function getNumber($jid)
  {
    return explode("@", $jid)[0];
  }