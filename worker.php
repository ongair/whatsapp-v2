<?php

  class Worker {
    public function perform() {
      echo $this->args['account'].PHP_EOL;
      echo "I'm so glad its over".PHP_EOL;
    }
  }