<?php

include('tests/bootstrap.php');
include('config.php');


$authData = new \Dhl\Structure\AuthData(USERNAME, PASSWORD);
$dhlClient = new \Dhl\Client('https://testowy.dhl24.com.pl/webapi', $authData);

//$result = $dhlClient->getVersion();
//var_dump($result);

$piece1 = new Dhl\Structure\PieceDefinition();
$piece1->setType(Dhl\Structure\PieceDefinition::TYPE_ENVELOPE);
$piece1->setQuantity(1);

$paymentData =  new Dhl\Structure\PaymentData();
$paymentData->setPayerType(\Dhl\Structure\PaymentData::TYPE_PAYER_RECEIVER);
$paymentData->setPaymentMethod(\Dhl\Structure\PaymentData::TYPE_PAYMENT_CASH);

$array = array(
    'pieceList' => array(
        $piece1
    ),
    'payment' => $paymentData
);

$shipmentFullData = \Dhl\Structure\ShipmentFullData\Factory::createFromArray($array);


$shipmentFullDataCollection = new Dhl\Structure\ShipmentFullData\Collection;
$shipmentFullDataCollection->addShipmentFullData($shipmentFullData);

//$result = $dhlClient->createShipments($shipmentFullDataCollection);
//var_dump($result);


$result = $dhlClient->getMyShipments(new DateTime('2014-07-24'), new DateTime('2014-07-26'));
//var_dump($result);

$shipmentId = 11102575394;
$shipmentId2 = 11102574635;
$result = $dhlClient->getShipmentScan($shipmentId);
//var_dump($result);

$data = $result->getShipmentScanResult->scanData;

//echo '<img src="data:image/png;base64,' . $data . '" />';

$itemToPrint = new Dhl\Structure\ItemToPrint();
$itemToPrint->setLabelType(Dhl\Structure\ItemToPrint::TYPE_LP);
$itemToPrint->setShipmentId($shipmentId);

$itemToPrint2 = new Dhl\Structure\ItemToPrint();
$itemToPrint2->setLabelType(Dhl\Structure\ItemToPrint::TYPE_LP);
$itemToPrint2->setShipmentId($shipmentId2);

$array = array(
    $itemToPrint,
    $itemToPrint2,
);
$result = $dhlClient->getLabels($array);
//var_dump($result);
/*
$labelMimeType = $result->getLabelsResult->item->labelMimeType;
$data = $result->getLabelsResult->item->labelData;
*/
header("Content-type: {$result[0]->getLabelMimeType()}");
echo base64_decode($result[0]->getLabelData());