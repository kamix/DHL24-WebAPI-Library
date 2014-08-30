<?php

namespace Dhl\Structure;

/**
 * PaymentData class represents:
 * @link https://dhl24.com.pl/webapi/doc/paymentData.html
 */
class PaymentData implements Structure {

    const TYPE_PAYER_SHIPPER = 'SHIPPER';
    const TYPE_PAYER_RECEIVER = 'RECEIVER';
    const TYPE_PAYER_USER = 'USER';
    const TYPE_PAYMENT_CASH = 'CASH';
    const TYPE_PAYMENT_BANK_TRANSFER = 'BANK_TRANSFER';

    private $paymentMethod;
    private $payerType;
    private $accountNumber;

    public function getPaymentMethod() {
        return $this->paymentMethod;
    }

    public function setPaymentMethod($paymentMethod) {
        $this->paymentMethod = $paymentMethod;
    }

    public function getPayerType() {
        return $this->payerType;
    }

    public function setPayerType($payerType) {
        $this->payerType = $payerType;
    }
    
    public function getAccountNumber() {
        return $this->accountNumber;
    }

    public function setAccountNumber($accountNumber) {
        $this->accountNumber = $accountNumber;
    }

    public function toArray() {
        return get_object_vars($this);
    }

}
