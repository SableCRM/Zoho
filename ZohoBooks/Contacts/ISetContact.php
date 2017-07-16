<?php

	namespace ZohoBooks\Contacts;

	use ZohoBooks\Objects\IAddress;

	interface ISetContact
	{
		public function setContactName();
		public function setCompanyName($companyName);
		public function setFirstName($firstName);
		public function setLastName($lastName);
		public function setEmail($email);
		public function setPhone($phone);
		public function setFacebook($facebook);
		public function setTwitter($twitter);
		public function setLanguageCode($languageCode);
		public function setBillingAddress(IAddress $address);
		public function setShippingAddress(IAddress $address);
		public function addContactPerson(IContactPerson $contactPerson);
		public function removeContactPerson(IContactPerson $contactPerson);
	}