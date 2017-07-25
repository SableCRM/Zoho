<?php

	namespace ZohoBooks\Objects;

	use Exception;
	use stdClass;
	use ZohoRequest\IRequestObject;

	class Address implements IAddress
	{
		private $attention;

		private $address;

		private $street2;

		private $stateCode;

		private $city;

		private $state;

		private $zip;

		private $country;

		private $fax;

		public function setAttention($attention)
		{
			if(strlen($attention) == 500)
			{
				throw new Exception("Address cannot exceed 500 characters.");
			}

			$this->attention = $attention;

			return $this;
		}

		public function setAddress1($address1)
		{
			$this->address = $address1;

			return $this;
		}

		public function setAddress2($address2)
		{
			$this->street2 = $address2;

			return $this;
		}

		public function setStateCode($stateCode)
		{
			$this->stateCode = $stateCode;

			return $this;
		}

		public function setCity($city)
		{
			$this->city = $city;

			return $this;
		}

		public function setState($state)
		{
			$this->state = $state;

			return $this;
		}

		public function setZip($zip)
		{
			$this->zip = $zip;

			return $this;
		}

		public function setCountry($country)
		{
			$this->country = $country;

			return $this;
		}

		public function setFax($fax)
		{
			$this->fax = $fax;

			return $this;
		}

		public function getAttention()
		{
			return $this->attention;
		}

		public function getAddress1()
		{
			return $this->address;
		}

		public function getAddress2()
		{
			return $this->street2;
		}

		public function getStateCode()
		{
			return $this->stateCode;
		}

		public function getCity()
		{
			return $this->city;
		}

		public function getState()
		{
			return $this->state;
		}

		public function getZip()
		{
			return $this->zip;
		}

		public function getCountry()
		{
			return $this->country;
		}

		public function getFax()
		{
			return $this->fax;
		}

		public function getParams()
		{
			$address = new stdClass();

			if($this->attention) $address->attention = $this->getAttention();
			if($this->address) $address->address = $this->getAddress1();
			if($this->street2) $address->street2 = $this->getAddress2();
			if($this->stateCode) $address->state_code = $this->getStateCode();
			if($this->city) $address->city = $this->getCity();
			if($this->state) $address->state = $this->getState();
			if($this->zip) $address->zip = $this->getZip();
			if($this->country) $address->country = $this->getCountry();
			if($this->fax) $address->fax = $this->getFax();

			return json_encode($address);
		}

		public function getDescription()
		{
			// TODO: Implement getDescription() method.
		}

		public function setId($id)
		{
			// TODO: Implement setId() method.
		}

		public function getId()
		{
			// TODO: Implement getId() method.
		}
	}