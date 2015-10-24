<?php

  class Worker {
    public function perform() {
      $client = new Client($this->args['account']);
    }
  }