<?php

namespace Dhl\Structure;

class BookCourier implements Structure
{
    
    private $pickupDate;
    
    private $pickupTimeFrom;
    
    private $pickupTimeTo;
    
    private $additionalInfo;
    
    private $shipmentIdList = array();
    
    public function setPickupDate($pickupDate)
    {
        $this->pickupDate = $pickupDate;
        
        return $this;
    }
    
    public function getPickupDate()
    {
        return $this->pickupDate;
    }
    
    public function setPickupTimeFrom($pickupTimeFrom)
    {
        $this->pickupTimeFrom = $pickupTimeFrom;
        
        return $this;
    }
    
    public function getPickupTimeFrom()
    {
        return $this->pickupTimeFrom;
    }
    
    public function setPickupTimeTo($pickupTimeTo)
    {
        $this->pickupTimeTo = $pickupTimeTo;
        
        return $this;
    }
    
    public function getPickupTimeTo()
    {
        return $this->pickupTimeTo;
    }
    
    public function setAdditionalInfo($additionalInfo)
    {
        $this->additionalInfo = $additionalInfo;
        
        return $this;
    }
    
    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
    }
    
    public function setShipmentIdList($shipmentIdList = array())
    {
        $this->shipmentIdList = $shipmentIdList;
        
        return $this;
    }
    
    public function getShipmentIdList()
    {
        return $this->shipmentIdList;
    }
    
    public function toArray() 
    {
        return get_object_vars($this);
    }
}