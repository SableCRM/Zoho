<?php

	namespace ZohoAuth;

	interface ISetAuthResponse
	{
		public function setCreateTime();

		public function setToken();

		public function setResult();
	}