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

		public function __construct(IContact $contact = null)
		{
			if($contact != null)
			{
				$this->setFirstName($contact->getFirstName());

				$this->setLastName($contact->getLastName());

				$this->setEmail($contact->getEmail());

				$this->setPhone($contact->getPhone());
			}
		}

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

		public function setIsPrimarycontact($isPrimaryContact)
		{
			$this->isPrimaryContact = $isPrimaryContact;

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

			$contactPerson->salutation = $this->salutation;
			$contactPerson->first_name = $this->firstName;
			$contactPerson->last_name = $this->lastName;
			$contactPerson->email = $this->email;
			$contactPerson->phone = $this->phone;
			$contactPerson->mobile = $this->mobile;
			$contactPerson->is_primary_contact = $this->isPrimaryContact;

			return json_encode($contactPerson);
		}
	}