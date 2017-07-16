<?php

	namespace ZohoBooks\Contacts;

	use Exception;
	use stdClass;
	use ZohoBooks\ArrayValues\LanguageCodes;
	use ZohoBooks\Objects\IAddress;
	use ZohoRequest\IRequestObject;

	class Contact implements IContact
	{
		private $contactName;

		private $companyName;

		private $firstName;

		private $lastName;

		private $email;

		private $phone;

		private $facebook;

		private $twitter;

		private $languageCode;

		private $billingAddress;

		private $shippingAddress;

		private $contactPersons = [];

//		private $paymentTerms;
//
//		private $currencyId;
//
//		private $website;
//
//		private $customFields = [];
//
//		private $salutation;
//
//		private $mobile;
//
//		private $isPrimaryContact;
//
//		private $defaultTemplates;
//
//		private $vatRegNo;
//
//		private $countryCode;
//
//		private $avataxExemptNo;
//
//		private $avataxUseCode;
//
//		private $taxExemptionId;
//
//		private $taxExemptionCode;
//
//		private $taxAuthorityId;
//
//		private $taxId;
//
//		private $isTaxible;
//
//		private $notes;
//
//		private $taxAuthorityName;
//
//		private $track1099;
//
//		private $taxIdType;
//
//		private $taxIdValue;
//
//		private $invoiceTemplateId;
//
//		private $estimateTemplateId;
//
//		private $creditnoteTemplateId;
//
//		private $invoiceEmailTemplateId;
//
//		private $estimateEmailTemplateId;
//
//		private $creditnoteEmailTemplateId;

		public function setContactName()
		{
			$this->contactName = $this->firstName . " " . $this->lastName;

			return $this;
		}

		public function setCompanyName($companyName)
		{
			if(strlen($companyName) > 200)
			{
				throw new Exception("Company Name cannot exceed 200 characters.");
			}

			$this->companyName = $companyName;

			return $this;
		}

		public function setFirstName($firstName)
		{
			if(strlen($firstName) > 100)
			{
				throw new Exception("First Name cannot exceed 100 characters.");
			}

			$this->firstName = $firstName;

			$this->setContactName();

			return $this;
		}

		public function setLastName($lastName)
		{
			if(strlen($lastName) > 100)
			{
				throw new Exception("Last Name cannot exceed 100 characters.");
			}

			$this->lastName = $lastName;

			$this->setContactName();

			return $this;
		}

		public function setEmail($email)
		{
			if(true)
			{
				// verify valid email
			}

			$this->email = $email;

			return $this;
		}

		public function setPhone($phone)
		{
			if(true)
			{
				// verify valid phone
			}

			$this->phone = $phone;

			return $this;
		}

		public function setFacebook($facebook)
		{
			if(strlen($facebook) > 100)
			{
				throw new Exception("facebook field cannot exceed 100 characters.");
			}

			$this->facebook = $facebook;

			return $this;
		}

		public function setTwitter($twitter)
		{
			if(strlen($twitter) > 100)
			{
				throw new Exception("twitter field cannot exceed 100 characters.");
			}

			$this->twitter = $twitter;

			return $this;
		}

		public function setLanguageCode($languageCode)
		{
			if(LanguageCodes::validateLangCode($languageCode))
			{
				$this->languageCode = LanguageCodes::getLangCode();
			}
			else
			{
				throw new Exception("Invalid Lang Code selected, must be one of the following ". implode(", ", LanguageCodes::getLangCodes()));
			}
		}

		public function setBillingAddress(IAddress $address)
		{
			$this->billingAddress = $address;
		}

		public function setShippingAddress(IAddress $address)
		{
			$this->shippingAddress = $address;
		}

		public function addContactPerson(IContactPerson $contactPerson)
		{
			$this->contactPersons[] = $contactPerson;
		}

		public function removeContactPerson(IContactPerson $contactPerson)
		{
			$index = array_search($contactPerson, $this->contactPersons);

			unset($this->contactPersons[$index]);
		}

		public function getContactPerson()
		{
			$index = array_search($contactPerson, $this->contactPersons);

			return $this->contactPersons[$index];
		}

		public function getContactPersons()
		{
			return $this->contactPersons;
		}

		public function getContactName()
		{
			return $this->contactName;
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

		public function getCompanyName()
		{
			return $this->companyName;
		}

		public function getFacebook()
		{
			return $this->facebook;
		}

		public function getTwitter()
		{
			return $this->twitter;
		}

		public function getLanguageCode()
		{
			return $this->languageCode;
		}

		public function getBillingAddress() : IRequestObject
		{
			return $this->billingAddress;
		}

		public function getShippingAddress() : IRequestObject
		{
			return $this->shippingAddress;
		}

		public function getParams()
		{
			$contactPersons = [];

			$contact = new stdClass();

			if($this->contactName) $contact->contact_name = $this->getContactName();
			if($this->companyName) $contact->company_name = $this->getCompanyName();
			if($this->firstName) $contact->first_name = $this->getFirstName();
			if($this->lastName) $contact->last_name = $this->getLastName();
			if($this->email) $contact->email = $this->getEmail();
			if($this->phone) $contact->phone = $this->getPhone();
			if($this->facebook) $contact->facebook = $this->getFacebook();
			if($this->twitter) $contact->twitter = $this->getTwitter();
			if($this->languageCode) $contact->language_code = $this->getLanguageCode();
			if($this->billingAddress) $contact->billing_address = $this->getBillingAddress()->getParams();
			if($this->shippingAddress) $contact->shipping_address = $this->getShippingAddress()->getParams();

			foreach($this->getContactPersons() as $contactPerson)
			{
				if(count($this->contactPersons) > 0)
				{
					$contactPersons[] = $contactPerson->getParams();

					$contact->contact_persons = $contactPersons;
				}
			};

			return json_encode($contact);
		}
	}