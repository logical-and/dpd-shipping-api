<?php

namespace DPD\Form;

use DPD\Form;
use Symfony\Component\Validator\Constraints as Assert;

class ParcelGeneration extends Form {

	/**
	 * client’s weblabel username
	 *
	 * @Assert\NotBlank
	 * @Assert\Length(max = 20)
	 */
	protected $username;
	/**
	 * client’s weblabel password
	 *
	 * @Assert\NotBlank
	 * @Assert\Length(max = 20)
	 */
	protected $password;
	/**
	 * Recipient name
	 *
	 * @Assert\NotBlank
	 * @Assert\Length(max = 40)
	 */
	protected $name1;
	/**
	 * Recipient name2 (if needed.)
	 * @Assert\Length(max = 40)
	 */
	protected $name2;
	/**
	 * Recipient street
	 *
	 * @Assert\NotBlank
	 * @Assert\Length(max = 40)
	 */
	protected $street;
	/**
	 * Recipient city
	 *
	 * @Assert\NotBlank
	 * @Assert\Length(max = 40)
	 */
	protected $city;
	/**
	 * Country code in iso2 cha
	 * format (Hungary is HU)
	 *
	 * @Assert\NotBlank
	 * @Assert\Length(max = 2)
	 */
	protected $country;
	/**
	 * Recipient postal code
	 *
	 * @Assert\NotBlank
	 * @Assert\Length(max = 9)
	 */
	protected $pcode;
	/**
	 * Recipient email
	 * @Assert\Length(max = 100)
	 *
	 * @Assert\Email
	 */
	protected $email;
	/**
	 * Recipient phone
	 * @Assert\Length(max = 50)
	 */
	protected $phone;
	/**
	 * Delivery instructions for courier
	 * @Assert\Length(max = 100)
	 */
	protected $remark;
	/**
	 * parcel’s weight
	 *
	 * @Assert\NotBlank
	 * @Assert\Length(max = 4)
	 */
	protected $weight;
	/**
	 * number of parcel labels to be
	 * generated
	 *
	 * @Assert\NotBlank
	 * @Assert\Length(max = 2)
	 */
	protected $num_of_parcel;
	/**
	 * customer’s order number
	 *
	 */
	protected $order_number;
	/**
	 * Parcel type string: DPD Classic: D,
	 * DPD Classic COD: D-COD. Complete
	 * type list in DPD Weblabel manual.
	 *
	 * @Assert\NotBlank
	 * Assert\Length(max = 10)
	 * Assert\Choice(choices = {"D", "D-COD", "D-CODEX", "D-CODU", "D-DOCRET", "D-SAT", "E12", "E12-COD"})
	 */
	protected $parcel_type;
	/**
	 * This field is made for the COD
	 * amount spliting. The following
	 * values are accepted: avg (the
	 * amount of each parcel will be the
	 * average amount of the given
	 * cod_amount), all (all parcel have the
	 * same amount which is in the
	 * cod_amount field), firstonly (only
	 * the first parcel will have the amount
	 * and the other will be simple DPD
	 * Classic parcel with the additional
	 * options given in the parcel_type
	 * field)
	 * @Assert\Length(max = 9)
	 * @Assert\Choice(choices = {"avg", "all", "firstonly"})
	 */
	protected $parcel_cod_type;
	/**
	 * NotBlank for COD, in destination
	 * country currency.
	 * @Assert\Length(max = 10)
	 */
	protected $cod_amount;
	/**
	 * COD Purpose
	 * @Assert\Length(max = 50)
	 */
	protected $cod_purpose;
	/**
	 * NotBlank for COP, in HUF
	 * @Assert\Length(max = 10)
	 */
	protected $cop_amount;
	/**
	 * NotBlank for Delta service
	 * @Assert\Length(max = 1)
	 */
	protected $delta_service;
	/**
	 * NotBlank if Delta service is chosen
	 * @Assert\Length(max = 1)
	 */
	protected $who_sends;
	/**
	 * NotBlank if Delta service is chosen
	 * @Assert\Length(max = 1)
	 */
	protected $who_prints;
	/**
	 * Only NotBlank if Delta service is
	 * chosen and the date is actual day
	 * @Assert\Length(max = 1)
	 */
	protected $same_day_pickup;
	/**
	 * Can be empty if same_day_pickup is
	 * set
	 * @Assert\Length(max = 8)
	 */
	protected $pickup_date;
	/**
	 * NotBlank for Delta service
	 * @Assert\Length(max = 80)
	 */
	protected $sender_name;
	/**
	 * NotBlank for Delta service
	 * @Assert\Length(max = 80)
	 */
	protected $sender_street;
	/**
	 * NotBlank for Delta service
	 * @Assert\Length(max = 50)
	 */
	protected $sender_city;
	/**
	 * NotBlank for Delta service
	 * @Assert\Length(max = 7)
	 */
	protected $sender_pcode;
	/**
	 * NotBlank for Delta service
	 * @Assert\Length(max = 50)
	 */
	protected $sener_countrycode;
	/**
	 * NotBlank for Delta service
	 * @Assert\Length(max = 50)
	 */
	protected $sender_phone;
	/**
	 * NotBlank for Delta service
	 * @Assert\Length(max = 50)
	 */
	protected $sender_email;
	/**
	 * NotBlank for Delta service
	 * @Assert\Length(max = 50)
	 */
	protected $sender_contact;
	/**
	 * NotBlank for Delta service
	 * @Assert\Length(max = 100)
	 */
	protected $sender_note;

	/**
	 * Set city
	 *
	 * @param mixed $city
	 * @return $this
	 */
	public function setCity($city) {
		$this->city = $city;

		return $this;
	}

	/**
	 * Set cod_amount
	 *
	 * @param mixed $cod_amount
	 * @return $this
	 */
	public function setCodAmount($cod_amount) {
		$this->cod_amount = $cod_amount;

		return $this;
	}

	/**
	 * Set cod_purpose
	 *
	 * @param mixed $cod_purpose
	 * @return $this
	 */
	public function setCodPurpose($cod_purpose) {
		$this->cod_purpose = $cod_purpose;

		return $this;
	}

	/**
	 * Set cop_amount
	 *
	 * @param mixed $cop_amount
	 * @return $this
	 */
	public function setCopAmount($cop_amount) {
		$this->cop_amount = $cop_amount;

		return $this;
	}

	/**
	 * Set country
	 *
	 * @param mixed $country
	 * @return $this
	 */
	public function setCountry($country) {
		$this->country = $country;

		return $this;
	}

	/**
	 * Set delta_service
	 *
	 * @param mixed $delta_service
	 * @return $this
	 */
	public function setDeltaService($delta_service) {
		$this->delta_service = $delta_service;

		return $this;
	}

	/**
	 * Set email
	 *
	 * @param mixed $email
	 * @return $this
	 */
	public function setEmail($email) {
		$this->email = $email;

		return $this;
	}

	/**
	 * Set name1
	 *
	 * @param mixed $name1
	 * @return $this
	 */
	public function setName1($name1) {
		$this->name1 = $name1;

		return $this;
	}

	/**
	 * Set name2
	 *
	 * @param mixed $name2
	 * @return $this
	 */
	public function setName2($name2) {
		$this->name2 = $name2;

		return $this;
	}

	/**
	 * Set num_of_parcel
	 *
	 * @param mixed $num_of_parcel
	 * @return $this
	 */
	public function setNumOfParcel($num_of_parcel) {
		$this->num_of_parcel = $num_of_parcel;

		return $this;
	}

	/**
	 * Set order_number
	 *
	 * @param mixed $order_number
	 * @return $this
	 */
	public function setOrderNumber($order_number) {
		$this->order_number = $order_number;

		return $this;
	}

	/**
	 * Set parcel_cod_type
	 *
	 * @param mixed $parcel_cod_type
	 * @return $this
	 */
	public function setParcelCodType($parcel_cod_type) {
		$this->parcel_cod_type = $parcel_cod_type;

		return $this;
	}

	/**
	 * Set parcel_type
	 *
	 * @param mixed $parcel_type
	 * @return $this
	 */
	public function setParcelType($parcel_type) {
		$this->parcel_type = $parcel_type;

		return $this;
	}

	/**
	 * Set password
	 *
	 * @param mixed $password
	 * @return $this
	 */
	public function setPassword($password) {
		$this->password = $password;

		return $this;
	}

	/**
	 * Set pcode
	 *
	 * @param mixed $pcode
	 * @return $this
	 */
	public function setPcode($pcode) {
		$this->pcode = $pcode;

		return $this;
	}

	/**
	 * Set phone
	 *
	 * @param mixed $phone
	 * @return $this
	 */
	public function setPhone($phone) {
		$this->phone = $phone;

		return $this;
	}

	/**
	 * Set pickup_date
	 *
	 * @param mixed $pickup_date
	 * @return $this
	 */
	public function setPickupDate($pickup_date) {
		$this->pickup_date = $pickup_date;

		return $this;
	}

	/**
	 * Set remark
	 *
	 * @param mixed $remark
	 * @return $this
	 */
	public function setRemark($remark) {
		$this->remark = $remark;

		return $this;
	}

	/**
	 * Set same_day_pickup
	 *
	 * @param mixed $same_day_pickup
	 * @return $this
	 */
	public function setSameDayPickup($same_day_pickup) {
		$this->same_day_pickup = $same_day_pickup;

		return $this;
	}

	/**
	 * Set sender_city
	 *
	 * @param mixed $sender_city
	 * @return $this
	 */
	public function setSenderCity($sender_city) {
		$this->sender_city = $sender_city;

		return $this;
	}

	/**
	 * Set sender_contact
	 *
	 * @param mixed $sender_contact
	 * @return $this
	 */
	public function setSenderContact($sender_contact) {
		$this->sender_contact = $sender_contact;

		return $this;
	}

	/**
	 * Set sender_email
	 *
	 * @param mixed $sender_email
	 * @return $this
	 */
	public function setSenderEmail($sender_email) {
		$this->sender_email = $sender_email;

		return $this;
	}

	/**
	 * Set sender_name
	 *
	 * @param mixed $sender_name
	 * @return $this
	 */
	public function setSenderName($sender_name) {
		$this->sender_name = $sender_name;

		return $this;
	}

	/**
	 * Set sender_note
	 *
	 * @param mixed $sender_note
	 * @return $this
	 */
	public function setSenderNote($sender_note) {
		$this->sender_note = $sender_note;

		return $this;
	}

	/**
	 * Set sender_pcode
	 *
	 * @param mixed $sender_pcode
	 * @return $this
	 */
	public function setSenderPcode($sender_pcode) {
		$this->sender_pcode = $sender_pcode;

		return $this;
	}

	/**
	 * Set sender_phone
	 *
	 * @param mixed $sender_phone
	 * @return $this
	 */
	public function setSenderPhone($sender_phone) {
		$this->sender_phone = $sender_phone;

		return $this;
	}

	/**
	 * Set sender_street
	 *
	 * @param mixed $sender_street
	 * @return $this
	 */
	public function setSenderStreet($sender_street) {
		$this->sender_street = $sender_street;

		return $this;
	}

	/**
	 * Set sener_countrycode
	 *
	 * @param mixed $sener_countrycode
	 * @return $this
	 */
	public function setSenerCountrycode($sener_countrycode) {
		$this->sener_countrycode = $sener_countrycode;

		return $this;
	}

	/**
	 * Set street
	 *
	 * @param mixed $street
	 * @return $this
	 */
	public function setStreet($street) {
		$this->street = $street;

		return $this;
	}

	/**
	 * Set username
	 *
	 * @param mixed $username
	 * @return $this
	 */
	public function setUsername($username) {
		$this->username = $username;

		return $this;
	}

	/**
	 * Set weight
	 *
	 * @param mixed $weight
	 * @return $this
	 */
	public function setWeight($weight) {
		$this->weight = $weight;

		return $this;
	}

	/**
	 * Set who_prints
	 *
	 * @param mixed $who_prints
	 * @return $this
	 */
	public function setWhoPrints($who_prints) {
		$this->who_prints = $who_prints;

		return $this;
	}

	/**
	 * Set who_sends
	 *
	 * @param mixed $who_sends
	 * @return $this
	 */
	public function setWhoSends($who_sends) {
		$this->who_sends = $who_sends;

		return $this;
	}
}