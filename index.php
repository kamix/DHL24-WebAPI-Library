<?php

include('tests/bootstrap.php');
include('config.php');

try{
    


$authData = new \Dhl\Structure\AuthData(USERNAME, PASSWORD);
$dhlClient = new \Dhl\Client('https://testowy.dhl24.com.pl/webapi', $authData);


$shipment = $dhlClient->isShipmentDelivered(11102575394);
$row = $dhlClient->getPostalCodeServices('26600', '2014-10-12');
//$result = $dhlClient->getVersion();
//var_dump($result);

$shipper = new Dhl\Structure\Address();
$shipper->setName('Piper Pipczynski');
$shipper->setContactPerson('Piper Pipczynski');
$shipper->setCity('Puławy');
$shipper->setPostalCode('24100');
$shipper->setContactPhone('');
$shipper->setContactEmail('teset@ww.pl');
$shipper->setStreet('Gazowa');
$shipper->setHouseNumber(9);
$shipper->setApartmentNumber(42);

$receiver = new Dhl\Structure\Address();
$receiver->setName('Weng Pawłowski');
$receiver->setContactPerson('Weng Pawłowski');
$receiver->setCity('Radom');
$receiver->setPostalCode('26600');
$receiver->setContactPhone('');
$receiver->setContactEmail('teset@ww2.pl');
$receiver->setStreet('Gródecka');
$receiver->setHouseNumber('22');
$receiver->setApartmentNumber(1);

$piece1 = new Dhl\Structure\PieceDefinition();
$piece1->setType(Dhl\Structure\PieceDefinition::TYPE_ENVELOPE);
$piece1->setQuantity(1);

// payment data receiver
/*
$paymentData =  new Dhl\Structure\PaymentData();
$paymentData->setPayerType(\Dhl\Structure\PaymentData::TYPE_PAYER_RECEIVER);
$paymentData->setPaymentMethod(\Dhl\Structure\PaymentData::TYPE_PAYMENT_CASH);
 */

$paymentData =  new Dhl\Structure\PaymentData();
$paymentData->setPayerType(\Dhl\Structure\PaymentData::TYPE_PAYER_USER);
$paymentData->setAccountNumber(ACCOUNT_NUMBER);
$paymentData->setPaymentMethod(\Dhl\Structure\PaymentData::TYPE_PAYMENT_BANK_TRANSFER);

$serviceDefinition = new \Dhl\Structure\ServiceDefinition();
$serviceDefinition->setProduct(\Dhl\Structure\ServiceDefinition::TYPE_PRODUCT_AH);
$serviceDefinition->setCollectOnDelivery(false);
$serviceDefinition->setInsurance(false);

$array = array(
    'shipper' => $shipper,
    'receiver' => $receiver,
    'pieceList' => array(
        $piece1
    ),
    'payment' => $paymentData,
    'service' => $serviceDefinition,
    'shipmentDate' => new \DateTime('now +1day'),
    'content' => 'Kokosy'
);

$shipmentFullData = \Dhl\Structure\ShipmentFullData\Factory::createFromArray($array);
//var_dump($shipmentFullData->toArray());
//die();


$shipmentFullDataCollection = new Dhl\Structure\ShipmentFullData\Collection;
$shipmentFullDataCollection->addShipmentFullData($shipmentFullData);

$result = $dhlClient->createShipments($shipmentFullDataCollection);

print_r($result);
/*$dhlClient->getLastResponse();
*/
}
        catch(\SoapFault $e) {
            //print_r($e);
            
            print_r($dhlClient->getLastResponse());
        }
        die();

/*
$result = $dhlClient->getMyShipments(new DateTime('2014-07-24'), new DateTime('2014-07-26'));
var_dump($result);*/

$shipmentId = 11102575394;
$shipmentId2 = 11102574635;
$shipmentId3 = 11102575574;
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

$itemToPrint3 = new Dhl\Structure\ItemToPrint();
$itemToPrint3->setLabelType(Dhl\Structure\ItemToPrint::TYPE_LP);
$itemToPrint3->setShipmentId($shipmentId3);

$array = array(
    $itemToPrint,
    $itemToPrint2,
    $itemToPrint3,
);
$result = $dhlClient->getLabels($array);
//var_dump($result);
/*
$labelMimeType = $result->getLabelsResult->item->labelMimeType;
$data = $result->getLabelsResult->item->labelData;
*/
/*
header("Content-type: {$result[2]->getLabelMimeType()}");
echo base64_decode($result[2]->getLabelData());
 */