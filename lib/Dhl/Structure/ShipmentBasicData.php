<?php

namespace Dhl\Structure;

use Dhl\Structure\Address;

/**
 * ShipmentBasicData class represents:
 * @link https://dhl24.com.pl/webapi/doc/shipmentFullData.html
 */
class ShipmentBasicData implements Structure {
    
    private $shipmentId;
    private $created;
    private $shipper;
    private $receiver;
    private $orderStatus;
    
    public function __construct() {
        
    }
    
    public function getShipmentId() {
        return $this->shipmentId;
    }

    public function getCreated() {
        return $this->created;
    }

    public function getShipper() {
        return $this->shipper;
    }

    public function getReceiver() {
        return $this->receiver;
    }

    public function getOrderStatus() {
        return $this->orderStatus;
    }

    public function setShipmentId($shipmentId) {
        $this->shipmentId = $shipmentId;
    }

    public function setCreated($created) {
        $this->created = $created;
    }

    public function setShipper(Address $shipper) {
        $this->shipper = $shipper;
    }

    public function setReceiver(Address $receiver) {
        $this->receiver = $receiver;
    }

    public function setOrderStatus($orderStatus) {
        $this->orderStatus = $orderStatus;
    }
    
    public function toArray() {
        return get_object_vars($this);
    }


    
}
