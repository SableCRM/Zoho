<?php

	namespace ZohoBooks\Objects;

	use Exception;
	use function json_encode;
	use stdClass;
	use ZohoRequest\IRequestObject;

	class Address implements IAddress, IRequestObject
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

			$address->attention = $this->attention;
			$address->address = $this->address;
			$address->street2 = $this->street2;
			$address->state_code = $this->stateCode;
			$address->city = $this->city;
			$address->state = $this->state;
			$address->zip = $this->zip;
			$address->country = $this->country;
			$address->fax = $this->fax;

			return json_encode($address);
		}
	}