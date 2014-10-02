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
        
        if (isset($array['receiver']) && $array['receiver'] instanceof \Dhl\Structure\Address) {
            $shipmentFullData->setReceiver($array['receiver']);
        }
        
        if (isset($array['shipper']) && $array['shipper'] instanceof \Dhl\Structure\Address) {
            $shipmentFullData->setShipper($array['shipper']);
        }
        
        $shipmentFullData->setPieceList($array['pieceList']);
        $shipmentFullData->setPayment($array['payment']);
        $shipmentFullData->setShipmentDate($array['shipmentDate']);
        $shipmentFullData->setService($array['service']);
        $shipmentFullData->setContent($array['content']);
        $shipmentFullData->setComment($array['comment']);
        
        return $shipmentFullData;
    }
}
