<?php

namespace Dhl\Structure\ShipmentBasicData;

use  Dhl\Structure\Address\Factory as AddressFactory;

class Factory {
    
    public static function createFromStdObject(\stdClass $object)
    {
        $shipmentBasicData = new \Dhl\Structure\ShipmentBasicData();
        $shipmentBasicData->setShipmentId($object->shipmentId);
        $shipmentBasicData->setCreated($object->created);
        $shipmentBasicData->setOrderStatus($object->orderStatus);
        $shipmentBasicData->setShipper(AddressFactory::createFromStdObject($object->shipper));
        $shipmentBasicData->setReceiver(AddressFactory::createFromStdObject($object->receiver));
        
        return $shipmentBasicData;
    }
}
