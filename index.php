<?php
/*
class DHL24_webapi_client extends SoapClient
{
    const WSDL = 'https://testowy.dhl24.com.pl/webapi';
 
    public function __construct()
    {
        parent::__construct( self::WSDL );
    }
}
 
$client = new DHL24_webapi_client;

$result = $client->getVersion();
var_dump($result);

/*$result = $client->__getFunctions();
var_dump($result);
*/
/*
$authData =  array(
        'username' => 'RESMEDIA',
        'password' => 'yBKp7WFPRh8dVk3' );

$arguments = array(
    'authData' => $authData,
    'createdFrom' => '2004-02-02',
    'createdTo' => '2004-02-03'
);

$result = $client->getMyShipments($arguments); //$client->__soapCall('AuthData', $arguments);

var_dump($result);*/
date_default_timezone_set('Europe/Warsaw');

function my_autoload($class)
{
    $class = str_replace('\\', '/', $class);
    require $class  . '.php';
}

spl_autoload_register('my_autoload');


$authData = new \Dhl\Structure\AuthData('RESMEDIA', 'yBKp7WFPRh8dVk3');
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
var_dump($result);

$shipmentId = 11102575394;
$result = $dhlClient->getShipmentScan($shipmentId);
var_dump($result);

$data = $result->getShipmentScanResult->scanData;

echo '<img src="data:image/png;base64,' . base64_decode($data) . '" />';