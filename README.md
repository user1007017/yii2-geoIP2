Yii2 GeoIP2 extension
=====================

Provides information about geographical location of user by IP address.

Currently available:
* Country
* City
* Latitude, Longitude
* Time Zone
* ISO Code
* Continent
* Subdivisions

## Install

```bash
$ php composer.phar require overals/yii2-geoip2 "~1.0"
```

#### OR

add to your `composer.json`

```json
{
    "require": {
        "overals/yii2-geoip2": "~1.0"
    }
}
```

and run

```bash
$ composer update
```

## Usage

### Like component

```php
<?php

$config = [
    ...
    'components' => [
        'geoip2' => [
            'class' => 'overals\GeoIP2\GeoIP2',
            'mmdb' => '@app/components/GeoIP2/GeoLite2-City.mmdb',
            'lng' => 'en',
        ],
    ]
    ...
];
```

somewhere in code:

```php
$ip = Yii::$app->component->geoip2->getInfoByIP(); // current user ip

$ip = Yii::$app->component->geoip->getInfoByIP("8.8.8.8");

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

