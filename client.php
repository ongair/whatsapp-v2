<?php
  
  class Client{
    private $account;

    public static function schedule($account) {
      Resque::setBackend(getenv('redis'));

      $args = array(
        'account' => $account
      );

      Resque::enqueue('default', 'Worker', $args); 
    }
  }