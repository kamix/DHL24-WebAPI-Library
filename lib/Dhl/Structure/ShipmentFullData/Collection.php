<?php

namespace Dhl\Structure\ShipmentFullData;

class Collection {
    
    private $items = array();

    public function __construct() {
        
    }
    
    public function addShipmentFullData(\Dhl\Structure\ShipmentFullData $shipmentFullData) {
        $this->items[] = $shipmentFullData;
    }
    
    public function toArray() 
    {
        $items = array();
        foreach ($this->items as $item) {
            $items[] = $item->toArray();
        }
        
        return $items;
    }
}
