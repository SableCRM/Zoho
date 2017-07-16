<?php

	namespace ZohoAuth;

	class CreateBooksAuth extends AbstractAuth
	{
		public function __construct($name = null)
		{
			parent::__construct($name);

			$this->scope = "ZohoBooks/booksapi";
		}
	}