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
      'onGetVideo',
      'onGetReceipt'
    );

    public function onGetMessage($account, $from, $id, $type, $time, $name, $body )
    {
      l("Message from $from: $body");

      $data = array('account' => $account, 'message' => array( 'text' => $body, 'phone_number' => getNumber($from), 'message_type' => 'Text', 'whatsapp_message_id' => $id, 'name' => $name) );
      postToServer('/messages', $data);
    }

    public function onGetReceipt( $from, $id, $offline, $retry ) {
      l("Receipt from $from");
    }

    public function onGetVideo( $account, $from, $id, $type, $time, $name, $video_url, $file, $size, $mimeType, $fileHash, $duration, $vcodec, $acodec, $preview, $caption )
    {
      l("Video received $from: $video_url");

      l("Preview: $preview");

      $data = array('account' => $account, 'message' => array('url' => $video_url, 'message_type' => 'Video', 'phone_number' => getNumber($from), 'whatsapp_message_id' => $id, 'name' => $name, 'caption' => $caption, 'preview' => base64_encode($preview) ));
      postToServer('/upload', $data);
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