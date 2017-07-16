<?php

	namespace ZohoBooks\Contacts;

	interface ISetContactPerson
	{
		public function setSalutation($salutation);
		public function setFirstName($firstName);
		public function setLastName($lastName);
		public function setEmail($email);
		public function setPhone($phone);
		public function setMobile($mobile);
		public function setIsPrimaryContact();
	}