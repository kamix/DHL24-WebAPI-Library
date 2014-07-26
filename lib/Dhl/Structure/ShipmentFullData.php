<?php

namespace Dhl\Structure;

class ShipmentFullData implements Structure {

    private $shipmentId;
    private $created;
    private $shipper;
    private $receiver;
    private $orderStatus;
    private $reference;
    private $content;
    private $comment;
    private $shipmentDate;
    private $service;
    private $payment;
    private $pieceList;

    public function getShipmentId() {
        return $this->shipmentId;
    }

    public function setShipmentId($shipmentId) {
        $this->shipmentId = $shipmentId;
    }

    public function getCreated() {
        return $this->created;
    }

    public function setCreated($created) {
        $this->created = $created;
    }

    public function getShipper() {
        return $this->shipper;
    }

    public function setShipper(Address $shipper) {
        $this->shipper = $shipper;
    }

    public function getReceiver() {
        return $this->receiver;
    }

    public function setReceiver(Address $receiver) {
        $this->receiver = $receiver;
    }

    public function getOrderStatus() {
        return $this->orderStatus;
    }

    public function setOrderStatus($orderStatus) {
        $this->orderStatus = $orderStatus;
    }

    public function getReference() {
        return $this->reference;
    }

    public function setReference($reference) {
        $this->reference = $reference;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function getComment() {
        return $this->comment;
    }

    public function setComment($comment) {
        $this->comment = $comment;
    }

    public function getShipmentDate() {
        return $this->shipmentDate;
    }

    public function setShipmentDate($shipmentDate) {
        $this->shipmentDate = $shipmentDate;
    }

    public function getService() {
        return $this->service;
    }

    public function setService($service) {
        $this->service = $service;
    }

    public function getPayment() {
        return $this->payment;
    }

    public function setPayment($payment) {
        $this->payment = $payment;
    }

    public function getPieceList() {
        return $this->pieceList;
    }

    public function setPieceList($pieceList) {
        $this->pieceList = $pieceList;
    }

    public function toArray() {
        $returnArray = array();
        
        $returnArray['shipper'] = $this->getShipper()->toArray();
        $returnArray['receiver'] = $this->getReceiver()->toArray();
        
        $returnArray['pieceList'] = array();
        foreach ($this->getPieceList() as $piece) {
            $returnArray['pieceList'][] = $piece->toArray();
        }
        $returnArray['payment'] = $this->getPayment()->toArray();
        $returnArray['service'] = $this->getService()->toArray();
        $returnArray['shipmentDate'] = $this->getShipmentDate()->format('Y-m-d');
        $returnArray['content'] = $this->getContent();
        
        return $returnArray;
    }

}
