<?php

namespace PayU;
use PayU\Api\Environment;

/**
 * Base class for Stripe test cases, provides some utility methods for creating
 * objects.
 */
class TestCase extends \PHPUnit_Framework_TestCase
{
  const API_KEY = '4Vj8eK4rloUd272L48hsrarnUA';
  const API_LOGIN = 'pRRXKOl8ikMmt9u';
  const MERCHANT_ID = "508029";
  const ACCOUNT_ID = "512321";

  private $mock;

  protected static function authorizeFromEnv()
  {
    $apiKey     = getenv('PAYU_API_KEY');
    $apiLogin   = getenv('PAYU_API_LOGIN');
    $merchantId = getenv('PAYU_MERCHANT_ID');
    $accountId  = getenv('PAYU_MERCHANT_ID');
    $isTest     = true;
    if(!$apiKey) {
      $apiKey = self::API_KEY;
    }
    if(!$apiLogin) {
      $apiLogin = self::API_LOGIN;
    }
    if(!$merchantId) {
      $merchantId = self::MERCHANT_ID;
    }
    if(!$accountId) {
      $accountId = self::ACCOUNT_ID;
    }
    PayU::$apiKey     = $apiKey;
    PaYU::$apiLogin   = $apiLogin;
    PayU::$merchantId = $merchantId;
    PayU::$accountId  = $accountId;
    PayU::$isTest     = $isTest;

    // Environment::setPaymentsCustomUrl("https://sandbox.api.payulatam.com/payments-api/4.0/service.cgi");
    // Environment::setReportsCustomUrl("https://sandbox.api.payulatam.com/reports-api/4.0/service.cgi");
    // Environment::setSubscriptionsCustomUrl("https://sandbox.api.payulatam.com/payments-api/rest/v4.3/");
  }
}
