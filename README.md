m2x-php
=======

API Documentation: https://m2x.att.com/developer/documentation/overview

## Using the lib and creating the instance ##

```php
<?php
include_once "lib/m2x.php";

$api_key = "<API KEY HERE>";
$feed_id = "<FEED>";

$m2x = new M2X($api_key);
```

## Endpoints ##

### List/Search Feeds ###
Reference: https://m2x.att.com/developer/documentation/feed#List-Search-Feeds

```php
<?php
$m2x = new M2X($api_key);

$response = $m2x->feeds()->all();
```

### Get details of an existing feed ###
Reference: https://m2x.att.com/developer/documentation/feed#View-Feed-Details

```php
<?php
$m2x = new M2X($api_key);

$response = $m2x->feeds()->view('<FEED-ID>');
```

### View Request Log ###
Reference: https://m2x.att.com/developer/documentation/feed#View-Request-Log

```php
<?php
$m2x = new M2X($api_key);

$response = $m2x->feeds()->log('<FEED-ID>');
```

### Read Datasource Location ###
Reference: https://m2x.att.com/developer/documentation/feed#Read-Datasource-Location

```php
<?php
$m2x = new M2X($api_key);

$response = $m2x->feeds()->location('<FEED-ID>');
```

### List Data Streams ###
Reference: https://m2x.att.com/developer/documentation/feed#List-Data-Streams

```php
<?php
$m2x = new M2X($api_key);

$response = $m2x->feeds()->streams('<FEED-ID>');
```

### View Data Stream ###
Reference: https://m2x.att.com/developer/documentation/feed#View-Data-Stream

```php
<?php
$m2x = new M2X($api_key);

$response = $m2x->feeds()->stream('<FEED-ID>', $stream);
```

### Create/Update Data Stream. ###
Reference: https://m2x.att.com/developer/documentation/feed#Create-Update-Data-Stream

```php
<?php
$m2x = new M2X($api_key);

$data = array(
  'value' => 1.23,
  'unit'  => array('label' => 'Celsius')
);
$response = $m2x->feeds()->update_stream('<FEED ID>', $stream, $data);
```

### Update Datasource Location ###
Reference: https://m2x.att.com/developer/documentation/feed#Update-Datasource-Location

```php
<?php
$m2x = new M2X($api_key);

$data = array(
  'name'      => 'Seattle',
  'latitude'  => 47.6097,
  'longitude' => 122.3331
);
$response = $m2x->feeds()->update_location('<FEED-ID>', $data);
```

### List Data Stream Values ###
Reference: https://m2x.att.com/developer/documentation/feed#List-Data-Stream-Values

```php
<?php
$m2x = new M2X($api_key);

$response = $m2x->feeds()->stream_values('<FEED ID>', $stream);
```

### Post Data Stream Values ###
Reference: https://m2x.att.com/developer/documentation/feed#Post-Data-Stream-Values

```php
<?php
$m2x = new M2X($api_key);

$data = array(
  array('value' => 456),
  array('value' => 789),
  array('value' => 123.145)
);
$response = $m2x->feeds()->add_stream_values($feed_id, $stream, $data);
```

License
=======

This library is released under the MIT license. See [`LICENSE`](LICENSE) for the terms.