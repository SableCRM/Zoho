<?php

	namespace ZohoAuth;

	use DateTime;
	use stdClass;
	use ZohoRequest\IMakeRequest;

	class AuthResponse implements ISetAuthResponse, IGetAuthResult
	{
		private $authResult;

		private $authResponse;

		public function __construct(IMakeRequest $authResponse)
		{
			$this->authResponse = $authResponse;

			$this->authResult = new stdClass();

			$this->setResult();

			$this->setCreateTime();
		}

		private function setResultArray($regx)
		{
			if(preg_match_all($regx, $this->authResponse->getResponse(), $output))
			{
				$output = $output[0][0];
			}
			
			return $output;
		}

		public function setCreateTime()
		{
			$this->authResult->timeCreated =
				new DateTime($this->setResultArray("/\w+\s\w+\s\d+\s\d+:\d+:\d+\s\w+\s\d+/i"));
		}

		public function setToken()
		{
			$this->authResult->token = $this->setResultArray("/\w{32}/i");
		}

		public function setResult()
		{
			$this->authResult->status = strtolower($this->setResultArray("/(true)|(false)/i"));

			($this->authResult->status == "true") ? $this->setToken() :
				$this->authResult->error = $this->setResultArray("/\w+_\w+/i");
		}

		public function getResult()
		{
			return $this->authResult;
		}
	}