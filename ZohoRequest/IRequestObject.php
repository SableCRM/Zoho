<?php

	namespace ZohoRequest;

	use ZohoBooks\Operations\IHaveDescription;
	use ZohoBooks\Operations\IHaveId;

	interface IRequestObject
	{
		public function getParams();
	}