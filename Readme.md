##Installation##
How to install this application:

### Requirements ###
Requires PHP5.6+

### Install Composer ###

  ```
    curl -sS https://getcomposer.org/installer | php
    php composer.phar install
  ```
 

### Running ###

```
    QUEUE=default APP_INCLUDE=processor.php php vendor/bin/resque
```

