Yii2 GeoIP2 extension
=====================



Subdivisions lng error in Result.php.

See commented code.
    
    PHP Notice 'yii\base\ErrorException' with message 'Undefined index: de'
    
    in /vendor/user1007017/yii2-geoip2/Result.php:89
    
    Stack trace:
    #0 /commands/ConsoleController.php(71): user1007017\GeoIP2\Result->__get()
    #1 /vendor/yiisoft/yii2/base/InlineAction.php(57): app\commands\ConsoleController->actionIndex()




-----------------------

Provides information about geographical location of user by IP address.

Currently available:
* Country
* City
* Latitude, Longitude
* Time Zone
* ISO Code
* Continent
* Subdivisions



## Installation

```bash
$ php composer.phar require user1007017/yii2-geoip2 "~1.0.1"
```

#### OR

Add to your `composer.json`

```json
{
    "require": {
        "user1007017/yii2-geoip2": "~1.0.1"
    }
}
```

and run

```bash
$ composer update
```

## Usage

Update your config file - config/web.php

```php
<?php

$config = [
    ...
    'components' => [
        'geoip2' => [
            'class' => 'user1007017\GeoIP2\GeoIP2',
            'mmdb' => '@app/components/GeoIP2/GeoLite2-City.mmdb',
            'lng' => 'en', // available languages = 'de', 'en', 'es', 'ja', 'ru', 'zh-CN'
        ],
    ]
    ...
];
```

somewhere in code:

```php
$ip = Yii::$app->component->geoip2->getInfoByIP(); // current user ip
$ip = Yii::$app->component->geoip2->getInfoByIP("8.8.8.8");

$ip->continent; // "North America"
$ip->country; // "United States"
$ip->isoCode; // "US"
$ip->subdivisions; // "California"
$ip->city; // "Mountain View"
$ip->location->longitude; // -122.0838
$ip->location->latitude; // 37.386

```

This product uses GeoLite2 data created by MaxMind, available from http://www.maxmind.com

### Where you can download Maxmind Free DBs?

From http://dev.maxmind.com/geoip/geoip2/geolite2/

#### OR

```bash
    cd /usr/local/share/GeoIP (change to your folder)
    wget -N -q http://geolite.maxmind.com/download/geoip/database/GeoLite2-City.mmdb.gz
    gunzip -c GeoLite2-City.mmdb.gz > GeoLite2-City.mmdb
```


