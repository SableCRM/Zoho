<?php

	namespace ZohoBooks\Contacts;

	use ZohoRequest\IRequestObject;
	use ZohoRequest\MakeRequest;

	class Create
	{
		private $url = "https://books.zoho.com/api/v3/contacts";

		private $authtoken;

		private $organization;

		public function __construct($authtoken, $orginization)
		{
			$this->authtoken = $authtoken;
			$this->organization = $orginization;
		}

		public function request(IRequestObject $obj)
		{
			$request = new MakeRequest();

			$request->setParams(["JSONString" => $obj->getParams()]);

			$request->setUrl($this->url);

			return $request->makeRequest();
		}
	}