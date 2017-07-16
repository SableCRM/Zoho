<?php

	namespace ZohoAuth;

	class CreateCRMAuth extends AbstractAuth
	{
		public function __construct($name = null)
		{
			parent::__construct($name);

			$this->scope = "ZohoCRM/crmapi";
		}
	}