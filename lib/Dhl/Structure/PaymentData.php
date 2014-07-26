<?php

namespace Dhl\Structure;

class PaymentData implements Structure {

    const TYPE_PAYER_SHIPPER = 'SHIPPER';
    const TYPE_PAYER_RECEIVER = 'RECEIVER';
    const TYPE_PAYER_USER = 'USER';
    const TYPE_PAYMENT_CASH = 'CASH';
    const TYPE_PAYMENT_BANK_TRANSFER = 'BANK_TRANSFER';

    private $paymentMethod;
    private $payerType;

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

    public function toArray() {
        return get_object_vars($this);
    }

}
