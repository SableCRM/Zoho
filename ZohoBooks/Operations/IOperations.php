<?php

	namespace ZohoBooks\Operations;

	use ZohoRequest\IRequestObject;

	interface IOperations
	{
		public function Create(IRequestObject $obj);
		public function Delete($id);
		public function Get($id);
		public function GetAll();
		public function Update($id);
	}