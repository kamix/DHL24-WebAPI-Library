<?php

namespace Dhl;

use \Dhl\Structure\ShipmentBasicData\Factory as ShipmentBasicDataFactory;
use \Dhl\Structure\ItemToPrintResponse\Factory as ItemToPrintResponseFactory;

class Client {
    
    private $soapClient;
    
    /** \Dhl\Structure\AuthData $authData */
    private $authData;
    
    public function __construct($url, \Dhl\Structure\AuthData $authData) {
        $this->soapClient = new \SoapClient($url,  array( 
            'trace'          => 1,
            'exceptions'      => 0
          ));
        $this->authData = $authData;
    }
    
    public function createShipments(\Dhl\Structure\ShipmentFullData\Collection $shipmentFullDataCollection) {
        $arguments = array(
            'authData' => $this->authData->toArray(),
            'shipments' => $shipmentFullDataCollection->toArray()
        );
        
        //var_dump($what);
        
        //var_dump($this->soapClient->__getLastResponse());
        
        return $this->soapClient->createShipments($arguments);
    }
    
    public function getLastResponse() {
        echo $this->soapClient->__getLastResponse();
        echo $this->soapClient->__getLastResponseHeaders();
    }
    
    /**
     * 
     * @param \DateTime $from
     * @param \DateTime $to
     * @return \Dhl\Structure\ShipmentBasicData[]
     */
    public function getMyShipments(\DateTime $from, \DateTime $to) 
    {
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
    
    /**
     * 
     * @param Dhl\Structure\ItemToPrint[] $itemsToPrint
     * @return \Dhl\Structure\ItemToPrintResponse[]
     */
    public function getLabels($itemsToPrint) 
    {
        $arguments = array(
            'authData' => $this->authData->toArray(),
            'itemsToPrint' => $itemsToPrint
        );
        
        $returnArray = array();
        
        $result = $this->soapClient->getLabels($arguments)->getLabelsResult->item;
        if (!is_array($result)) {
            $result = array($result);
        }
        
        foreach ($result as $item) {
            $returnArray[] = ItemToPrintResponseFactory::createFromStdObject($item);
        }
        
        return $returnArray;
    }
    
    /**
     * Method allows to fetch waybill for given ID.
     * @param type $shipmentId
     * @return type
     */
    public function getShipmentScan($shipmentId) 
    {
        $arguments = array(
            'authData' => $this->authData->toArray(),
            'shipmentId' => $shipmentId
        );
        
        return $this->soapClient->getShipmentScan($arguments);
    }
    
    /**
     * 
     * @return type
     */
    public function getVersion() 
    {
        return $this->soapClient->getVersion();
    }
}

