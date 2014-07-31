<?php

namespace Dhl\Structure;

/**
 * ItemToPrintResponse class represents:
 * @link https://dhl24.com.pl/webapi/doc/itemToPrintResponse.html
 */
class ItemToPrintResponse implements Structure {

    private $shipmentId;
    private $labelType;
    private $labelData;
    private $labelMimeType;

    public function getShipmentId() {
        return $this->shipmentId;
    }

    public function setShipmentId($shipmentId) {
        $this->shipmentId = $shipmentId;
    }

    public function getLabelType() {
        return $this->labelType;
    }

    public function setLabelType($labelType) {
        $this->labelType = $labelType;
    }

    public function getLabelData() {
        return $this->labelData;
    }

    public function setLabelData($labelData) {
        $this->labelData = $labelData;
    }

    public function getLabelMimeType() {
        return $this->labelMimeType;
    }

    public function setLabelMimeType($labelMimeType) {
        $this->labelMimeType = $labelMimeType;
    }

    public function toArray() {
        return get_object_vars($this);
    }

}
