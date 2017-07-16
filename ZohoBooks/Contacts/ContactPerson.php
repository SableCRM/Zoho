<?php

	namespace ZohoBooks\Contacts;

	use stdClass;
	use ZohoRequest\IRequestObject;

	class ContactPerson implements IContactPerson, IRequestObject
	{
		private $salutation;

		private $firstName;

		private $lastName;

		private $email;

		private $phone;

		private $mobile;

		private $isPrimaryContact;

		public function setSalutation($salutation)
		{
			$this->salutation = $salutation;

			return $this;
		}

		public function setFirstName($firstName)
		{
			$this->firstName = $firstName;

			return $this;
		}

		public function setLastName($lastname)
		{
			$this->lastName = $lastname;

			return $this;
		}

		public function setEmail($email)
		{
			$this->email = $email;

			return $this;
		}

		public function setPhone($phone)
		{
			$this->phone = $phone;

			return $this;
		}

		public function setMobile($mobile)
		{
			$this->mobile = $mobile;

			return $this;
		}

		public function setIsPrimarycontact()
		{
			$this->isPrimaryContact = true;

			return $this;
		}

		public function getSalutation()
		{
			return $this->salutation;
		}

		public function getFirstName()
		{
			return $this->firstName;
		}

		public function getLastName()
		{
			return $this->lastName;
		}

		public function getEmail()
		{
			return $this->email;
		}

		public function getPhone()
		{
			return $this->phone;
		}

		public function getMobile()
		{
			return $this->mobile;
		}

		public function getIsPrimaryContact()
		{
			return $this->isPrimaryContact;
		}

		public function getParams()
		{
			$contactPerson = new stdClass();

			if($this->salutation) $contactPerson->salutation = $this->getSalutation();
			if($this->firstName) $contactPerson->first_name = $this->getFirstName();
			if($this->lastName) $contactPerson->last_name = $this->getLastName();
			if($this->email) $contactPerson->email = $this->getEmail();
			if($this->phone) $contactPerson->phone = $this->getPhone();
			if($this->mobile) $contactPerson->mobile = $this->getMobile();
			if($this->isPrimaryContact) $contactPerson->is_primary_contact = $this->getIsPrimaryContact();

			return json_encode($contactPerson);
		}
	}