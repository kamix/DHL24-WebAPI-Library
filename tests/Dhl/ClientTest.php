<?php

namespace Test\Dhl;
/*
use Dhl\Client,
    Dhl\AuthData;
*/
class ClientTest extends \PHPUnit_Framework_TestCase {
    
    private $client;
 
    public function setUp() {
        $authData = new \Dhl\AuthData('', '');
        //$this->client = new Client('https://testowy.dhl24.com.pl/webapi', $authData);
    }
    
    public function testAsd() {
        $this->assertTrue(realpath(__FILE__));
    }
}

