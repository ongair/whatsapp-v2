<?php
  
  require_once('models/Account.php');
  require_once('events.php');

  class Client{
    private $account;
    private $wa;
    private $connected = false;

    function __construct($phone_number) {
      $this->account = Account::find_by_phone_number($phone_number);

      l("Account is ".$this->account->name);

      $this->wa = new WhatsProt($this->account->phone_number, $this->account->name, getenv('debug') == 'true', true);
      $events = new OngairEvents($this->wa, $this);      
      $events->setEventsToListenFor($events->activeEvents);

      $this->wa->connect();
      $this->wa->loginWithPassword($this->account->whatsapp_password);
    }

    public function loop() {
      while($this->connected) {
        l('Starting job loop');

        $this->wa->pollMessage(true, "delivered");
        $this->connected = false;
      }
      l('End of job loop');
    }

    public function setConnected($status) {
      $this->connected = $status;
    }

    public static function schedule($account) {
      Resque::setBackend(getenv('redis'));

      $args = array(
        'account' => $account
      );

      Resque::enqueue('default', 'Worker', $args); 
    }
  }