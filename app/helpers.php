<?php

	define('developer','Eljohn Duñgo');

	if (!function_exists('sanitize_string')) {

		function sanitize_string($str) {

			$str = stripslashes(filter_var($str, FILTER_SANITIZE_STRING));

			return $str;
		}
	}

	if (!function_exists('sanitize_email')) {

		function sanitize_email($email) {

			$email = filter_var($email, FILTER_SANITIZE_EMAIL);

			return $email;
		}
	}

	if (!function_exists('sanitize_int')) {

		function sanitize_int($str)
		{

			$str = stripslashes(filter_var($str, FILTER_SANITIZE_NUMBER_INT));

			return $str;
		}
	}

