<?php

namespace Dhl\Structure\ShipmentFullData;

class Factory {
    
    /**
     * @param type $array
     * @return \Dhl\Structure\ShipmentFullData
     */
    public static function createFromArray($array)
    {
        $shipmentFullData = new \Dhl\Structure\ShipmentFullData();
        
        $shipmentFullData->setShipmentId(12354);
        
        if (isset($array['receiver']) && $array['receiver'] instanceof Address) {
            $shipmentFullData->setReceiver($array['receiver']);
        }
        
        if (isset($array['shipper']) && $array['shipper'] instanceof Address) {
            $shipmentFullData->setShipper($array['shipper']);
        }
        
        
        
        return $shipmentFullData;
    }
}
