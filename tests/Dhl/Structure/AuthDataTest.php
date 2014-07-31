<?php

namespace Test\Dhl\Structure;

use \Dhl\Structure\AuthData;

class AuthDataTest extends \PHPUnit_Framework_TestCase {

    private $authData;
    
    public function setUp() {
        $this->authData = new AuthData('fake_user', 'fake_password');
    }
    
    public function testToArray() {
        
        $expectedResult = array('username' => 'fake_user',
                                'password' => 'fake_password');
        
        $this->assertEquals($expectedResult, $this->authData->toArray());
    }
}
