<?php
	
	class RegexUtil{
		
		const NUMERIC_REGEX = "/^[-]?[0-9]+$/i";

		const POSITIVE_NUMERIC_REGEX = "/^[-]?[0-9]+$/i";

		const NEGATIVE_NUMERIC_REGEX = "/^[-][0-9]+$/i";

		const FLOAT_REGEX = "/^\d*\.?\d+$/";

		const ALPHABET_REGEX = "/^[a-zA-Z\s]+$/i";

		const EMAIL_REGEX = "/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/";

		const MOBILE_REGEX = "/^[6-9][0-9]{9}$/" ;

		const PINCODE_REGEX = "/^[0-9]{6}$/";
	}

?>