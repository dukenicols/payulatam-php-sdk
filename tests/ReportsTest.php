<?php

namespace PayU;
use PayU\Reports as PayUReports;
use PayU\Util\Parameters as PayUParameters;

/**
 * Base class for Stripe test cases, provides some utility methods for creating
 * objects.
 */
 class ReportsTest extends TestCase
 {

  public function testDoPing()
  {
    $response = PayUReports::doPing();
    $this->assertObjectHasAttribute('code', $response);
    $this->assertEquals('SUCCESS', $response->code);
    $this->assertObjectHasAttribute('result', $response);
    $this->assertObjectHasAttribute('payload', $response->result);
    $this->assertEquals('ping', $response->result->payload);
  }

  public function testGetOrderDetails()
  {
    $parameters = array(PayUParameters::ORDER_ID => "919480529");

    $order = PayUReports::getOrderDetail($parameters);

    $this->assertObjectHasAttribute('accountId', $order);
    $this->assertObjectHasAttribute('status', $order);
    $this->assertObjectHasAttribute('referenceCode', $order);
    $this->assertObjectHasAttribute('additionalValues', $order);
    $this->assertObjectHasAttribute('TX_VALUE', $order->additionalValues);
    $this->assertObjectHasAttribute('TX_TAX', $order->additionalValues);
    $this->assertObjectHasAttribute('buyer', $order);
    $this->assertObjectHasAttribute('emailAddress', $order->buyer);
    $this->assertObjectHasAttribute('fullName', $order->buyer);
    $this->assertObjectHasAttribute('transactions', $order);
  }

  public function testGetOrderDetailByReferenceCode()
  {
    $parameters = array(PayUParameters::REFERENCE_CODE => "payment_test_20170109021231");
    $response = PayUReports::getOrderDetailByReferenceCode($parameters);
    var_dump($response);
    die();
  }

}
