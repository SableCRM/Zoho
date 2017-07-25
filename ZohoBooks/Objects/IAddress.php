<?php

	namespace ZohoBooks\Objects;

	use ZohoRequest\IRequestObject;

	interface IAddress extends IRequestObject
	{
		public function getAttention();
		public function getAddress1();
		public function getAddress2();
		public function getStateCode();
		public function getCity();
		public function getState();
		public function getZip();
		public function getCountry();
		public function getFax();
		public function setAttention($attention);
		public function setAddress1($address1);
		public function setAddress2($address2);
		public function setStateCode($stateCode);
		public function setCity($city);
		public function setState($state);
		public function setZip($zip);
		public function setCountry($country);
		public function setFax($fax);
	}