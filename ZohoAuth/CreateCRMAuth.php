<?php

	namespace ZohoAuth;

	use ZohoRequest\IMakeRequest;

	class CreateCRMAuth extends AbstractAuth
	{
		public function __construct(IMakeRequest $request, $name = null)
		{
			parent::__construct($request, $name);

			$this->scope = "ZohoCRM/crmapi";
		}
	}