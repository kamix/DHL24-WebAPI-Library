<?php

namespace Dhl\Structure;

/**
 * ItemToPrint class represents:
 * @link https://dhl24.com.pl/webapi/doc/itemToPrint.html
 */
class ItemToPrint implements Structure {

    const TYPE_LP = 'LP';
    const TYPE_BLP = 'BLP';
    const TYPE_ZBLP = 'ZBLP';

    private $labelType;
    private $shipmentId;

    public function getLabelType() {
        return $this->labelType;
    }

    public function setLabelType($labelType) {
        $this->labelType = $labelType;
    }

    public function getShipmentId() {
        return $this->shipmentId;
    }

    public function setShipmentId($shipmentId) {
        $this->shipmentId = $shipmentId;
    }

    public function toArray() {
        return get_object_vars($this);
    }

}
