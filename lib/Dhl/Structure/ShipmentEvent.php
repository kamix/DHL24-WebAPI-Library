<?php

namespace Dhl\Structure;

/**
 * ShipmentFullData class represents:
 * @link https://dhl24.com.pl/webapi/doc/shipmentFullData.html
 */
class ShipmentEvent implements Structure {

    private $status;
    private $description;
    private $timestamp;
    private $terminal;
    
    public function setStatus($status) {
        $this->status = $status;
        
        return $this;
    }
    
    public function getStatus() {
        return $this->status;
    }
    
    public function setDescription($description) {
        $this->description = $description;
        
        return $this;
    }
    
    public function getDescription() {
        return $this->description;
    }
    
    public function setTimestamp($timestamp) {
        $this->timestamp = $timestamp;
        
        return $this;
    }
    
    public function getTimestamp() {
        return $this->timestamp;
    }
    
    public function setTerminal($terminal) {
        $this->terminal = $terminal;
        
        return $this;
    }
    
    public function getTerminal() {
        return $this->terminal;
    }
    
    public function toArray() {
        return get_object_vars($this);
    }
}