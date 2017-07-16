<?php

	namespace ZohoRequest;

	use const CURLOPT_CUSTOMREQUEST;

	class MakeRequest implements IMakeRequest
	{
		protected $url;

		protected $params;

		protected $response;

		public function setUrl($url)
		{
			$this->url = $url;
		}

		public function getUrl()
		{
			return $this->url;
		}

		public function getResponse()
		{
			return $this->response;
		}

		public function setParams($params)
		{
			$this->params = $params;
		}

		public function getParams()
		{
			$data = "";

			foreach($this->params as $paramKey => $paramValue)
			{
				$data .= $paramKey."=".$paramValue."&";
			}

			$data = rtrim($data, "&");

			return $data;
		}

		public function makeRequest($method)
		{
			$ch = curl_init($this->url);

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

			$this->response = curl_exec($ch);

			curl_close($ch);

			return $this;
		}
	}