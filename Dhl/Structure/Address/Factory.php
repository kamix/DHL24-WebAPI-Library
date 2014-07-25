<?php

namespace Dhl\Structure\Address;

use Dhl\Structure\Address;

class Factory {
    
    public static function createFromStdObject(\stdClass $object)
    {
        $address = new Address();
        $address->setApartmentNumber($object->apartmentNumber);
        $address->setCity($object->city);
        $address->setContactEmail($object->contactEmail);
        $address->setContactPerson($object->contactPerson);
        $address->setContactPhone($object->contactPhone);
        $address->setHouseNumber($object->houseNumber);
        $address->setName($object->name);
        $address->setPostalCode($object->postalCode);
        $address->setStreet($object->street);
        
        return $address;
    }
}
