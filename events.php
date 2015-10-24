<?php
  class OngairEvents extends AllEvents
  {
    private $client;

    public function __construct($wa, $client) {
      parent::__construct($wa);
      $this->client = $client;
    }

    public $activeEvents = array(
      'onConnect',
      'onLoginSuccess',
      'onGetMessage',
      'onGetVideo'
    );

    public function onGetMessage($account, $from, $id, $type, $time, $name, $body )
    {
      l("Message from $from: $body");

      $data = array('account' => $account, 'message' => array( 'text' => $body, 'phone_number' => getNumber($from), 'message_type' => 'Text', 'whatsapp_message_id' => $id, 'name' => $name) );
      postToServer('/messages', $data);
    }

    public function onConnect($account, $socket) {
      l('Connected');
    }

    public function onLoginSuccess($account, $kind, $status, $creation, $expiration) {
      l("Account: ".$account.PHP_EOL);
      l("Status: ".$status.PHP_EOL);

      $this->client->setConnected(true);
    }
  }