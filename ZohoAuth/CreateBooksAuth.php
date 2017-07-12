<?php

	namespace ZohoAuth;

	use ZohoRequest\IMakeRequest;

	class CreateBooksAuth extends AbstractAuth
	{
		public function __construct(IMakeRequest $request, $name = null)
		{
			parent::__construct($request, $name);

			$this->scope = "ZohoBooks/booksapi";
		}
	}