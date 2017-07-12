<?php

	namespace ZohoRequest;

	interface IMakeRequest
	{
		public function setUrl($url);

		public function getUrl();

		public function getResponse();

		public function setParams(array $params);

		public function getParams();

		public function makeRequest();
	}