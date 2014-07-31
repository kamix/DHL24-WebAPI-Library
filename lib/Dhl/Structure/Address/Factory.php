<?php

namespace Dhl\Structure\Address;

use Dhl\Structure\Address;

/**
 * Factory for \Dhl\Structure\Address
 * Allows to get Address object based on different data:
 * - stdClass
 * ...
 */
class Factory {
    
    /**
     * Allows to get Address object based on stdClass
     * @param \stdClass $object
     * @return \Dhl\Structure\Address
     */
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
