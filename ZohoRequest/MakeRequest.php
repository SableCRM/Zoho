<?php

	namespace ZohoRequest;

	class MakeRequest implements IMakeRequest
	{
		private $url;

		private $params;

		private $response;

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

		public function setParams(array $params)
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

		public function makeRequest()
		{
			$ch = curl_init($this->url);

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			curl_setopt($ch, CURLOPT_POSTFIELDS, $this->getParams());

			curl_setopt($ch, CURLOPT_POST, true);

			$this->response = curl_exec($ch);

			curl_close($ch);

			return $this;
		}
	}