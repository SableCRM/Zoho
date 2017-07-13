<?php

	namespace ZohoBooks\Contacts;

	interface IContact
	{
		public function getFirstName();

		public function getLastName();

		public function getEmail();

		public function getPhone();
	}