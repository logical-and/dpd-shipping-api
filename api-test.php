<?php

if (is_file(__DIR__ . '/vendor/autoload.php')) require __DIR__ . '/vendor/autoload.php';

$api     = new DPD\API();
$numbers = $api->generateParcel(DPD\Form\ParcelGeneration::newInstance()
		->setUsername('demo')
		->setPassword('o2Ijwe2')
		->setName1('And')
		->setStreet('Kesmark u 4')
		->setCity('Budapest')
		->setCountry('HU')
		->setPcode('1158')
		->setWeight('1')
		->setNumOfParcel(1)
		->setParcelType('D')
);

echo 'Number is: ' . $numbers[ 0 ] . '<br>';

echo 'Status is: ' . $api->getParcelStatus('FcJyN7vU7WKPtUh7m1bx', $numbers[ 0 ]);