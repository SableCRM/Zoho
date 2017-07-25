<?php

	namespace ZohoBooks\ArrayValues;

	use function define;

	class LanguageCodes
	{
		private static $code;

		public const DE = "de";
		public const EN = "en";
		public const ES = "es";
		public const FR = "fr";
		public const IT = "it";
		public const JA = "ja";
		public const NL = "nl";
		public const PT = "pt";
		public const PT_BR = "pt_br";
		public const SV = "sv";
		public const ZH = "zh";
		public const EN_GB = "en_gb";

		private const langCodes = [self::DE, self::EN, self::ES, self::FR, self::IT, self::JA, self::NL, self::PT,self::PT_BR, self::SV, self::ZH, self::EN_GB];

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