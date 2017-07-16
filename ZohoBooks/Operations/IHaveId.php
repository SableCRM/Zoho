<?php

	namespace ZohoBooks\Operations;

	interface IHaveId
	{
		public function setId($id);
		public function getId();
	}