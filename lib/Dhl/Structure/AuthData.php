<?php

namespace Dhl\Structure;

/**
 * AuthData class represents:
 * @link https://dhl24.com.pl/webapi/doc/autoryzacyjna.html
 */
class AuthData implements Structure
{
    private $username;
    private $password;
    
    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }
    
    public function toArray()
    {
        return get_object_vars($this);
    }
    
}
