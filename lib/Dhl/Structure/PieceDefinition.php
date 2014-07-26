<?php

namespace Dhl\Structure;

class PieceDefinition implements Structure {

    const TYPE_ENVELOPE = 'ENVELOPE';
    const TYPE_PACKAGE = 'PACKAGE';
    const TYPE_PALLET = 'PALLET';

    private $types = array(self::TYPE_ENVELOPE, self::TYPE_PACKAGE, self::TYPE_PALLET);
    private $type;
    private $width;
    private $height;
    private $length;
    private $weight;
    private $quantity;

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        if (!in_array($type, $this->types)) {
            throw new \LogicException('Use predefined type from `PieceDefinition`');
        }

        $this->type = $type;
    }

    public function getWidth() {
        return $this->width;
    }

    public function setWidth($width) {
        $this->width = $width;
    }

    public function getHeight() {
        return $this->height;
    }

    public function setHeight($height) {
        $this->height = $height;
    }

    public function getLength() {
        return $this->length;
    }

    public function setLength($length) {
        $this->length = $length;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function toArray() {
        $returnArray = get_object_vars($this);
        unset($returnArray['types']);
        return $returnArray;
    }

}
