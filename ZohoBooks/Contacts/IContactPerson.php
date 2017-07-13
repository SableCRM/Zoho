<?php

	namespace ZohoBooks\Contacts;

	interface IContactPerson
	{
		public function getSalutation();

		public function getFirstName();

		public function getLastName();

		public function getEmail();

		public function getPhone();

		public function getMobile();

		public function getIsPrimaryContact();
	}