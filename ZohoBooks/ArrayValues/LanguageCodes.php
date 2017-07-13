<?php

	namespace ZohoBooks\ArrayValues;

	class LanguageCodes
	{
		private static $code;

		private const langCodes = ["de", "en", "es", "fr", "it", "ja", "nl", "pt", "pt_br", "sv", "zh", "en_gb"];

		public static function validateLangCode($code)
		{
			$isValid = false;

			if(self::$code = array_search(strtolower($code), self::langCodes))
			{
				$isValid = true;
			}

			return $isValid;
		}

		public static function getLangCodes()
		{
			return self::langCodes;
		}

		public static function getLangCode()
		{
			return self::langCodes[self::$code];
		}
	}