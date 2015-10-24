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
      'onGetMessage'
    );

    public function onGetMessage($account, $from, $id, $type, $time, $name, $body )
    {
      l("Message from $from: $body");

      // # check if the message exists in the db
      // if (!$this->exists($id)) {
                
      //   $phone_number = get_phone_number($from);
      //   $account_id = $this->client->get_account_id();
      //   $account = Account::find_by_id($account_id);
        
      //   $url = $this->url.'/messages';
      //   $data = array('account' => $me, 'message' => array( 'text' => $body, 'phone_number' => $phone_number, 'message_type' => 'Text', 'whatsapp_message_id' => $id, 'name' => $name) );
        
      //   $this->post($url, $data);

      //   // $contact = Contact::find_by_phone_number_and_account_id($phone_number, $account_id);
      //   // if (!$contact->synced && $account->experimental) {
      //     // TODO: How to avoid double syncs
      //     // $attributes = array('method' => 'sync', 'sent' => false, 'targets' => $contact->phone_number, 'args' => 'Interactive', 'account_id' => $account_id);
      //     // $job = JobLog::create($attributes);
      //   // }

      //   $notif = array('type' => 'text', 'phone_number' => $phone_number , 'text' => $body, 'name' => $name);
      //   $this->send_realtime($notif);
      // }      
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