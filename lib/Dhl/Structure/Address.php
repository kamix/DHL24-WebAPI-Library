<?php

namespace Dhl\Structure;

/**
 * Address class represents:
 * @link https://dhl24.com.pl/webapi/doc/adresowa.html
 */
class Address implements Structure {

    private $name;
    private $postalCode;
    private $city;
    private $street;
    private $houseNumber;
    private $apartmentNumber;
    private $contactPerson;
    private $contactPhone;
    private $contactEmail;

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getPostalCode() {
        return $this->postalCode;
    }

    public function setPostalCode($postalCode) {
        $this->postalCode = $postalCode;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function getStreet() {
        return $this->street;
    }

    public function setStreet($street) {
        $this->street = $street;
    }

    public function getHouseNumber() {
        return $this->houseNumber;
    }

    public function setHouseNumber($houseNumber) {
        $this->houseNumber = $houseNumber;
    }

    public function getApartmentNumber() {
        return $this->apartmentNumber;
    }

    public function setApartmentNumber($apartmentNumber) {
        $this->apartmentNumber = $apartmentNumber;
    }

    public function getContactPerson() {
        return $this->contactPerson;
    }

    public function setContactPerson($contactPerson) {
        $this->contactPerson = $contactPerson;
    }

    public function getContactPhone() {
        return $this->contactPhone;
    }

    public function setContactPhone($contactPhone) {
        $this->contactPhone = $contactPhone;
    }

    public function getContactEmail() {
        return $this->contactEmail;
    }

    public function setContactEmail($contactEmail) {
        $this->contactEmail = $contactEmail;
    }

    public function toArray() {
        return get_object_vars($this);
    }

}
