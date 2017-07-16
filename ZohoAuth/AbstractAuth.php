<?php

	namespace ZohoAuth;

	use stdClass;
	use ZohoRequest\MakeRequest;

	abstract class AbstractAuth extends MakeRequest
	{
		protected $name;

		protected $scope;

		public function __construct($name = null)
		{
			$this->name = $name;

			$this->url = "https://accounts.zoho.com/apiauthtoken/nb/create?";
		}

		private function getResult($authResult)
		{
			return new AuthResponse($authResult);
		}

		public function getAuth($username, $password)
		{
			$params = new stdClass();

			$params->SCOPE = $this->scope;
			$params->EMAIL_ID = $username;
			$params->PASSWORD = $password;
			$params->DISPLAY_NAME = $this->name;

			$this->setParams($params);

			$this->setUrl($this->url .= $this->getParams());

			return $this->getResult($this->makeRequest("POST"));
		}
	}