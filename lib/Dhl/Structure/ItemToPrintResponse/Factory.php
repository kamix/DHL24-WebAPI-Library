<?php

namespace Dhl\Structure\ItemToPrintResponse;


class Factory {
    
    public static function createFromStdObject(\stdClass $object)
    {
        $itemToPrintResponse = new \Dhl\Structure\ItemToPrintResponse();
        $itemToPrintResponse->setLabelData($object->labelData);
        $itemToPrintResponse->setLabelType($object->labelType);
        $itemToPrintResponse->setLabelMimeType($object->labelMimeType);
        $itemToPrintResponse->setShipmentId($object->shipmentId);
        
        return $itemToPrintResponse;
    }
}
