<?php

	namespace ZohoBooks\Contacts;

	use ZohoRequest\IRequestObject;

	interface IContact extends ISetContact, IRequestObject
	{
		public function getContactName();
		public function getCompanyName();
		public function getFirstName();
		public function getLastName();
		public function getEmail();
		public function getPhone();
		public function getFacebook();
		public function getTwitter();
		public function getLanguageCode();
		public function getBillingAddress();
		public function getShippingAddress();
		public function getContactPerson();
		public function getContactPersons();
	}