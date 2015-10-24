##Installation##
How to install this application:

### Requirements ###
Requires PHP5.6+
Redis

### Installing Redis ###

https://www.digitalocean.com/community/tutorials/how-to-install-and-use-redis

```
    sudo apt-get install redis-server
```

### Install Composer ###

  ```
    curl -sS https://getcomposer.org/installer | php
    php composer.phar install
  ```
 
### Installing chat-api dependencies ###
```
    <!-- Protobuf -->
    git clone https://github.com/allegro/php-protobuf.git
    cd php-protobuf
    phpize
    ./configure
    make
    sudo make install

    <!-- Curve25519 -->
    git clone https://github.com/mgp25/curve25519-php.git
    cd curve25519-php
    phpize
    ./configure
    make
    sudo make install
```

### Scheduling a job ###
This is a single job queue. It works by scheduling an account to be added to the queue. This is then picked up by the worker.

```
    php scheduler.php <account>
```

### Running the workers ###

```
    QUEUE=default APP_INCLUDE=init.php php vendor/bin/resque &
```

