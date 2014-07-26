<?php

namespace Dhl\Structure;

class ServiceDefinition implements Structure {

    const TYPE_PRODUCT_AH = 'AH';
    const TYPE_PRODUCT_09 = '09';
    const TYPE_PRODUCT_12 = '12';

    private $product;
    private $deliveryEvening;
    private $deliverySaturday;
    private $collectOnDelivery;
    private $collectOnDeliveryValue;
    private $collectOnDeliveryForm;
    private $collectOnDeliveryReference;
    private $insurance;
    private $insuranceValue;
    private $returnOnDelivery;
    private $returnOnDeliveryReference;
    private $proofOfDelivery;
    private $selfCollect;
    private $predeliveryInformation;
    private $preaviso;

    public function getProduct() {
        return $this->product;
    }

    public function setProduct($product) {
        $this->product = $product;
    }

    public function getDeliveryEvening() {
        return $this->deliveryEvening;
    }

    public function setDeliveryEvening($deliveryEvening) {
        $this->deliveryEvening = $deliveryEvening;
    }

    public function getDeliverySaturday() {
        return $this->deliverySaturday;
    }

    public function setDeliverySaturday($deliverySaturday) {
        $this->deliverySaturday = $deliverySaturday;
    }

    public function getCollectOnDelivery() {
        return $this->collectOnDelivery;
    }

    public function setCollectOnDelivery($collectOnDelivery) {
        $this->collectOnDelivery = $collectOnDelivery;
    }

    public function getCollectOnDeliveryValue() {
        return $this->collectOnDeliveryValue;
    }

    public function setCollectOnDeliveryValue($collectOnDeliveryValue) {
        $this->collectOnDeliveryValue = $collectOnDeliveryValue;
    }

    public function getCollectOnDeliveryForm() {
        return $this->collectOnDeliveryForm;
    }

    public function setCollectOnDeliveryForm($collectOnDeliveryForm) {
        $this->collectOnDeliveryForm = $collectOnDeliveryForm;
    }

    public function getCollectOnDeliveryReference() {
        return $this->collectOnDeliveryReference;
    }

    public function setCollectOnDeliveryReference($collectOnDeliveryReference) {
        $this->collectOnDeliveryReference = $collectOnDeliveryReference;
    }

    public function getInsurance() {
        return $this->insurance;
    }

    public function setInsurance($insurance) {
        $this->insurance = $insurance;
    }

    public function getInsuranceValue() {
        return $this->insuranceValue;
    }

    public function setInsuranceValue($insuranceValue) {
        $this->insuranceValue = $insuranceValue;
    }

    public function getReturnOnDelivery() {
        return $this->returnOnDelivery;
    }

    public function setReturnOnDelivery($returnOnDelivery) {
        $this->returnOnDelivery = $returnOnDelivery;
    }

    public function getReturnOnDeliveryReference() {
        return $this->returnOnDeliveryReference;
    }

    public function setReturnOnDeliveryReference($returnOnDeliveryReference) {
        $this->returnOnDeliveryReference = $returnOnDeliveryReference;
    }

    public function getProofOfDelivery() {
        return $this->proofOfDelivery;
    }

    public function setProofOfDelivery($proofOfDelivery) {
        $this->proofOfDelivery = $proofOfDelivery;
    }

    public function getSelfCollect() {
        return $this->selfCollect;
    }

    public function setSelfCollect($selfCollect) {
        $this->selfCollect = $selfCollect;
    }

    public function getPredeliveryInformation() {
        return $this->predeliveryInformation;
    }

    public function setPredeliveryInformation($predeliveryInformation) {
        $this->predeliveryInformation = $predeliveryInformation;
    }

    public function getPreaviso() {
        return $this->preaviso;
    }

    public function setPreaviso($preaviso) {
        $this->preaviso = $preaviso;
    }

    public function toArray() {
        return get_object_vars($this);
    }

}
