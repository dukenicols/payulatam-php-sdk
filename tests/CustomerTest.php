<?php

namespace PayU;
use PayU\Util\Parameters as PayUParameters;
use PayU\Customers as PayUCustomers;

class CustomerTest extends TestCase
{
  public function testCreate()
  {
    self::authorizeFromEnv();
    $parameters = array(
    	// Ingresa aquí el nombre del cliente
    	PayUParameters::CUSTOMER_NAME => "Pedro Perez",
    	// Ingresa aquí el correo del cliente
    	PayUParameters::CUSTOMER_EMAIL => "demo@demo.com"
    );

    $response = PayUCustomers::create($parameters);
    var_dump($response);
    $this->assertObjectHasAttribute('id', $response);
    $this->assertObjectHasAttribute('fullName', $response);
    $this->assertEquals('Pedro Perez', $response->fullName);
    $this->assertObjectHasAttribute('email', $response);
    $this->assertEquals('demo@demo.com', $response->email);
  }

  public function testUpdate()
  {
    self::authorizeFromEnv();
    $parameters = array(
      // Ingresa aquí el identificador del cliente,
      PayUParameters::CUSTOMER_ID => "ad23fg2pp3jt",
      // Ingresa aquí el nombre del cliente
      PayUParameters::CUSTOMER_NAME => "Pedro Gutierrez",
      // Ingresa aquí el correo del cliente
      PayUParameters::CUSTOMER_EMAIL => "demo@demo.com"
    );

    $response = PayUCustomers::update($parameters);
    $this->assertObjectHasAttribute('id', $response);
    $this->assertObjectHasAttribute('fullName', $response);
    $this->assertEquals('Pedro Gutierrez', $response->fullName);
    $this->assertObjectHasAttribute('email', $response);
    $this->assertEquals('demo@demo.com', $response->email);
  }

  public function testFind()
  {
    self::authorizeFromEnv();
    $parameters = array(
    	// Ingresa aquí el nombre del cliente
    	PayUParameters::CUSTOMER_ID => "ad23fg2pp3jt",
      PayUParameters::CUSTOMER_NAME => "Pedro Gutierrez"
    );
    $response = PayUCustomers::find($parameters);

    $response = PayUCustomers::update($parameters);
    $this->assertObjectHasAttribute('id', $response);
    $this->assertObjectHasAttribute('fullName', $response);
    $this->assertEquals('Pedro Gutierrez', $response->fullName);
    $this->assertObjectHasAttribute('email', $response);
    $this->assertEquals('demo@demo.com', $response->email);
  }
}
