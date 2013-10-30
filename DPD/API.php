<?php

namespace DPD;

use Buzz\Browser;
use Buzz\Client\Curl;
use Buzz\Client\FileGetContents;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Symfony\Component\Validator\Validation;

// Validation autoloading
AnnotationRegistry::registerLoader(function ($name) {
	return class_exists($name);
});

class API {

	public function generateParcel(Form\ParcelGeneration $form) {
		$this->validateForm($form);

		$url  = 'https://weblabel.dpd.hu/dpd_wow/parcel_import.php';
		$json = $this->requestJson($url, $form, 'POST', array('content-type' => 'application/x-www-form-urlencoded'));
		$json = array_merge(array(
			'status'    => 'ok',
			'errlog'    => NULL,
			'pl_number' => array()
		), $json);
		if ('ok' != $json[ 'status' ]) throw new Exception\ParcelGeneration($json[ 'errlog' ], json_encode($json));

		return $json[ 'pl_number' ];
	}

	public function getParcelStatus($secret, $parcel_number) {
		$form = Form\ParcelStatus::newInstance()->setSecret($secret)->setParcelNumber($parcel_number);
		$this->validateForm($form);

		$url  = 'https://weblabel.dpd.hu/dpd_wow/parcel_status.php';
		$json = $this->requestJson($url, $form, 'POST', array('content-type' => 'application/x-www-form-urlencoded'));
		$json = array_merge(array(
			'parcel_status' => 'Unknown error'
		), $json);

		return ! empty($json['errmsg']) ? $json['errmsg'] : $json[ 'parcel_status' ];
	}

	public function getTrackingUrl($parcel_number, $language = 'en') {
		return "https://tracking.dpd.de/cgi-bin/delistrack?pknr=$parcel_number&lang=$language";
	}

	protected function validateForm(Form $form) {
		$validator  = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();
		$violations = $validator->validate($form);
		if ($violations->count()) throw new Exception\Validation($violations);

		return $form;
	}

	protected function requestJson($url, $data = array(), $method = 'GET', array $headers = array()) {
		$content = $this->request($url, $data, $method, $headers);
		$json    = json_decode($this->request($url, $data, $method, $headers), TRUE);
		if (!$json) $json = array('errlog' => $content, 'status' => 'err');
		return $json;
	}

	protected function request($url, $data = array(), $method = 'GET', array $headers = array()) {
		if ($data instanceof Form) $data = $data->toArray();
		$client = new Curl();
		$client->setVerifyPeer(FALSE);
		$browser  = new Browser($client);
		$response = $browser->submit($url, $data, $method, $headers);

		return $response->getContent();
	}
}
 