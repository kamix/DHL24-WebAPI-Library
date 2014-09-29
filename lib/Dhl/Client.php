<?php

namespace Dhl;

use \Dhl\Structure\ShipmentBasicData\Factory as ShipmentBasicDataFactory;
use \Dhl\Structure\ItemToPrintResponse\Factory as ItemToPrintResponseFactory;

/**
 * \Dhl\Client 
 * Decorator of \SoapClient class which helps making requests to DHL24 API
 */
class Client {
    
    /** \SoapClient $soapClient */
    private $soapClient;
    
    /** \Dhl\Structure\AuthData $authData */
    private $authData;
    
    private $errorMessages = array();
    
    public function __construct($url, \Dhl\Structure\AuthData $authData) {
        $this->soapClient = new \SoapClient($url,  array( 
            'trace'          => 1,
            'exceptions'      => 0
          ));
        
        $this->authData = $authData;
    }
    
    /**
     * @link https://dhl24.com.pl/webapi/doc/createShipments.html
     * @param \Dhl\Structure\ShipmentFullData\Collection $shipmentFullDataCollection
     * @return type
     */
    public function createShipments(\Dhl\Structure\ShipmentFullData\Collection $shipmentFullDataCollection) {
        $arguments = array(
            'authData' => $this->authData->toArray(),
            'shipments' => $shipmentFullDataCollection->toArray()
        );
        
        $result = $this->soapClient->createShipments($arguments);
        
        if (!isset($result->createShipmentsResult)) {
            $this->errorMessages[] = $result->faultstring;
            
            return false;
        }
        
        return ShipmentBasicDataFactory::createFromStdObject($result->createShipmentsResult->item);
    }
    
    /**
     * getLastResponse : just for debug
     * @return void
     */
    public function getLastResponse() {
        print_r($this->soapClient->__getLastResponse());
        print_r($this->soapClient->__getLastResponseHeaders());
    }
    
    /**
     * 
     * @return string[]
     */
    public function getErrorMessages() {
        return $this->errorMessages;
    }
    
    /**
     * Method allows to fetch all shipments of DHL customer
     * @link https://dhl24.com.pl/webapi/doc/getMyShipments.html
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
     * Method allows to fetch waybill in PDF format.
     * @link https://dhl24.com.pl/webapi/doc/getLabels.html
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
     * @link https://dhl24.com.pl/webapi/doc/getShipmentScan.html
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
     * @link https://dhl24.com.pl/webapi/doc/bookCourier.html
     * @param \Dhl\Structure\BookCourier $bookCourier
     * @return type
     */
    public function bookCourier(\Dhl\Structure\BookCourier $bookCourier)
    {
        $arguments = array(
            'authData' => $this->authData->toArray(),
        );
        
        $arguments = array_merge($arguments, $bookCourier->toArray());
        
        $result = $this->soapClient->bookCourier($arguments);
        
        if (!isset($result->bookCourierResult)) {
            $this->errorMessages[] = $result->faultstring;
            
            return false;
        }
        
        return $result->bookCourierResult->item;
    }
    
    public function isShipmentDelivered($shipmentId) 
    {
        $arguments = array(
            'authData'   => $this->authData->toArray(),
            'shipmentId' => $shipmentId
        );
        
        $result = $this->soapClient->getTrackAndTraceInfo($arguments);
        if (!isset($result->getTrackAndTraceInfoResult)) {
            $this->errorMessages[] = $result->faultstring;
            
            return false;
        }
        
        if ('' == $result->getTrackAndTraceInfoResult->receivedBy) {
            return false;
        }
        
        return true;
    }
    
    /**
     * Returns version of DHL24 webservice
     * @link https://dhl24.com.pl/webapi/doc/getVersion.html
     * @return type
     */
    public function getVersion() 
    {
        return $this->soapClient->getVersion();
    }
}

