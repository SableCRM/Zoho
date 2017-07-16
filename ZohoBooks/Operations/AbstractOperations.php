<?php

	namespace ZohoBooks\Operations;

	use stdClass;
	use ZohoRequest\MakeRequest;

	abstract class AbstractOperations extends MakeRequest
	{
		protected $url;

		protected $method;

		protected $params;

		public function __construct($authtoken, $organization = null)
		{
			$this->params = new stdClass();

			$this->params->authtoken = $authtoken;

			$this->params->organization_id = $organization;

			$this->setParams($this->params);
		}

		public function request()
		{
			$this->setUrl($this->url);

			return $this->makeRequest($this->method);
		}
	}