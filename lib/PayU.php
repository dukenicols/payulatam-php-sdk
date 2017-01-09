<?php

namespace PayU;

use PayU\Api\Environment;

/**
 *
 * Holds basic request information
 *
 * @author PayU Latam
 * @since 1.0.0
 * @version 1.0.0, 20/10/2013
 *
 */
class PayU {

  /**
	 * Api version
	 */
	const  API_VERSION = "4.0.1";

	/**
	 * Api name
	 */
	const  API_NAME = "PayU SDK";


	const API_CODE_NAME = "PAYU_SDK";

	/**
	 * The method invocation is for testing purposes
	 */
	public static $isTest = false;

	/**
	 * The merchant API key
	 */
	public static  $apiKey = null;

	/**
	 * The merchant API Login
	 */
	public static  $apiLogin = null;

	/**
	 * The merchant Id
	 */
	public static  $merchantId = null;
	/**
	 * The merchant Id
	 */
	public static  $accountId = null;

	/**
	 * The request language es / en / pt
	 */
	public static $language = 'es';

}



/** validates Environment before begin any operation */
	Environment::validate();
