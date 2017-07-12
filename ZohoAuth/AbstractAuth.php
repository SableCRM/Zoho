<?php

	namespace ZohoAuth;

	use ZohoRequest\IMakeRequest;

	abstract class AbstractAuth
	{
		protected $url;

		protected $name;

		protected $scope;

		protected $zohoRequest;


		public function __construct(IMakeRequest $request, $name = null)
		{
			$this->name = $name;

			$this->zohoRequest = $request;

			$this->url = "https://accounts.zoho.com/apiauthtoken/nb/create";
		}

		private function getResult($authResult)
		{
			return new AuthResponse($authResult);
		}

		public function getAuth($username, $password)
		{
			$this->zohoRequest->setUrl($this->url);

			$this->zohoRequest->setParams(
				[
					"SCOPE"    => $this->scope,
					"EMAIL_ID" => $username,
					"PASSWORD" => $password,
					"DISPLAY_NAME" => $this->name,
					]
			);

			return $this->getResult($this->zohoRequest->makeRequest());
		}
	}