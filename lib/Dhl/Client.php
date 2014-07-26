<?php

namespace Dhl;

use \Dhl\Structure\ShipmentBasicData\Factory as ShipmentBasicDataFactory;

class Client {
    
    private $soapClient;
    
    /** \Dhl\Structure\AuthData $authData */
    private $authData;
    
    public function __construct($url, \Dhl\Structure\AuthData $authData) {
        $this->soapClient = new \SoapClient($url);
        $this->authData = $authData;
    }
    
    public function createShipments(\Dhl\Structure\ShipmentFullData\Collection $shipmentFullDataCollection) {
        $arguments = array(
            'authData' => $this->authData->toArray(),
            'shipments' => $shipmentFullDataCollection->toArray()
        );
        
        return $this->soapClient->createShipments($arguments);
    }
    
    /**
     * 
     * @param \DateTime $from
     * @param \DateTime $to
     * @return \Dhl\Structure\ShipmentBasicData[]
     */
    public function getMyShipments(\DateTime $from, \DateTime $to) {
        $arguments = array(
            'authData' => $this->authData->toArray(),
            'createdFrom' => $from->format('Y-m-d'),
            'createdTo' => $to->format('Y-m-d')
        );
        
        $response = $this->soapClient->getMyShipments($arguments);

        $array = array();
        foreach ($response->getMyShipmentsResult->item as $item) {
            $array[] = ShipmentBasicDataFactory::createFromStdObject($item);
        }
        
        return $array;
    }
    
    public function getLabels($itemsToPrint) 
    {
        $arguments = array(
            'authData' => $this->authData->toArray(),
            'itemsToPrint' => $itemsToPrint
        );
        
        return $this->soapClient->getLabels($arguments);
    }
    
    /**
     * Method allows to fetch waybill for given ID.
     * @param type $shipmentId
     * @return type
     */
    public function getShipmentScan($shipmentId) {
        $arguments = array(
            'authData' => $this->authData->toArray(),
            'shipmentId' => $shipmentId
        );
        
        return $this->soapClient->getShipmentScan($arguments);
    }
    
    public function getVersion() {
        return $this->soapClient->getVersion();
    }
}

