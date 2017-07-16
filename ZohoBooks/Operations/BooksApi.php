<?php

	namespace ZohoBooks\Operations;

	use ZohoRequest\IRequestObject;

	class BooksApi extends AbstractOperations
	{
		public function Create(IRequestObject $obj)
		{
			$this->method = "POST";

			$this->params->JSONString = $obj->getParams();

			$this->url = "https://books.zoho.com/api/v3/contacts?".$this->getParams();

			$this->request();
		}

		public function Get($id)
		{
			$this->method = "GET";

			$this->url = "https://books.zoho.com/api/v3/contacts/".$id."?".$this->getParams();

			$this->request();
		}

		public function GetAll()
		{
			$this->method = "GET";

			$this->url = "https://books.zoho.com/api/v3/contacts?".$this->getParams();

			$this->request();
		}

		public function Update($id)
		{
			$this->method = "PUT";

			$this->url = "https://books.zoho.com/api/v3/contacts/".$id."?".$this->getParams();

			$this->request();
		}

		public function Delete($id)
		{
			$this->method = "DELETE";

			$this->url = "https://books.zoho.com/api/v3/contacts/".$id."?".$this->getParams();

			$this->request();
		}
	}