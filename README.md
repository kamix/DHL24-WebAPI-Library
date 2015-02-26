DHL24 WebAPI Library
------------

This library is SDK for:
https://dhl24.com.pl/webapi/doc.html


Usage
-----

```php

    $authData = new \Dhl\Structure\AuthData(USERNAME, PASSWORD);
    $dhlClient = new \Dhl\Client('https://testowy.dhl24.com.pl/webapi', $authData);

    $result = $dhlClient->getVersion();
