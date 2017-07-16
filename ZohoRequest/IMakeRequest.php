<?php

	namespace ZohoRequest;

	interface IMakeRequest extends IRequestObject
	{
		public function setUrl($url);
		public function getUrl();
		public function setParams($params);
		public function makeRequest($method);
		public function getResponse();
	}