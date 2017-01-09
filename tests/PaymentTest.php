<?php

namespace PayU;
use PayU\Util\Parameters as PayUParameters;
use PayU\Api\Countries as PayUCountries;
use PayU\Payments as PayUPayments;

class PaymentTest extends TestCase
{
  // public function testUrls()
  // {
  //   Api\Environment::setPaymentsCustomUrl("https://sandbox.api.payulatam.com/payments-api/4.0/service.cgi");
  //   Api\Environment::setReportsCustomUrl("https://sandbox.api.payulatam.com/reports-api/4.0/service.cgi");
  //   Api\Environment::setSubscriptionsCustomUrl("https://sandbox.api.payulatam.com/payments-api/rest/v4.3/");
  // }

  public function testCreate()
  {
    self::authorizeFromEnv();

    $reference = "payment_test_".date("Ymdhis");
    $value = "10000";

    $parameters = array(
    	//Ingrese aquí el identificador de la cuenta.
    	PayUParameters::ACCOUNT_ID => PayU::$accountId,
    	//Ingrese aquí el código de referencia.
    	PayUParameters::REFERENCE_CODE => $reference,
    	//Ingrese aquí la descripción.
    	PayUParameters::DESCRIPTION => "payment test",

    	// -- Valores --
    	//Ingrese aquí el valor.
    	PayUParameters::VALUE => $value,
    	//Ingrese aquí la moneda.
    	PayUParameters::CURRENCY => "COP",

    	// -- Comprador
    	//Ingrese aquí el nombre del comprador.
    	PayUParameters::BUYER_NAME => "First name and second buyer name",
    	//Ingrese aquí el email del comprador.
    	PayUParameters::BUYER_EMAIL => "buyer_test@test.com",
    	//Ingrese aquí el teléfono de contacto del comprador.
    	PayUParameters::BUYER_CONTACT_PHONE => "7563126",
    	//Ingrese aquí el documento de contacto del comprador.
    	PayUParameters::BUYER_DNI => "5415668464654",
    	//Ingrese aquí la dirección del comprador.
    	PayUParameters::BUYER_STREET => "calle 100",
    	PayUParameters::BUYER_STREET_2 => "5555487",
    	PayUParameters::BUYER_CITY => "Medellin",
    	PayUParameters::BUYER_STATE => "Antioquia",
    	PayUParameters::BUYER_COUNTRY => "CO",
    	PayUParameters::BUYER_POSTAL_CODE => "000000",
    	PayUParameters::BUYER_PHONE => "7563126",

    	// -- pagador --
    	//Ingrese aquí el nombre del pagador.
    	PayUParameters::PAYER_NAME => "First name and second payer name",
    	//Ingrese aquí el email del pagador.
    	PayUParameters::PAYER_EMAIL => "payer_test@test.com",
    	//Ingrese aquí el teléfono de contacto del pagador.
    	PayUParameters::PAYER_CONTACT_PHONE => "7563126",
    	//Ingrese aquí el documento de contacto del pagador.
    	PayUParameters::PAYER_DNI => "5415668464654",
    	//Ingrese aquí la dirección del pagador.
    	PayUParameters::PAYER_STREET => "calle 93",
    	PayUParameters::PAYER_STREET_2 => "125544",
    	PayUParameters::PAYER_CITY => "Bogota",
    	PayUParameters::PAYER_STATE => "Bogota",
    	PayUParameters::PAYER_COUNTRY => "CO",
    	PayUParameters::PAYER_POSTAL_CODE => "000000",
    	PayUParameters::PAYER_PHONE => "7563126",

    	// -- Datos de la tarjeta de crédito --
    	//Ingrese aquí el número de la tarjeta de crédito
    	PayUParameters::CREDIT_CARD_NUMBER => "4097440000000004",
    	//Ingrese aquí la fecha de vencimiento de la tarjeta de crédito
    	PayUParameters::CREDIT_CARD_EXPIRATION_DATE => "2017/12",
    	//Ingrese aquí el código de seguridad de la tarjeta de crédito
    	PayUParameters::CREDIT_CARD_SECURITY_CODE=> "321",
    	//Ingrese aquí el nombre de la tarjeta de crédito
    	//VISA||MASTERCARD||AMEX||DINERS
    	PayUParameters::PAYMENT_METHOD => "VISA",

    	//Ingrese aquí el número de cuotas.
    	PayUParameters::INSTALLMENTS_NUMBER => "1",
    	//Ingrese aquí el nombre del pais.
    	PayUParameters::COUNTRY => PayUCountries::CO,

    	//Session id del device.
    	PayUParameters::DEVICE_SESSION_ID => "vghs6tvkcle931686k1900o6e1",
    	//IP del pagadador
    	PayUParameters::IP_ADDRESS => "127.0.0.1",
    	//Cookie de la sesión actual.
    	PayUParameters::PAYER_COOKIE=>"pt1t38347bs6jc9ruv2ecpv7o2",
    	//Cookie de la sesión actual.
    	PayUParameters::USER_AGENT=>"Mozilla/5.0 (Windows NT 5.1; rv:18.0) Gecko/20100101 Firefox/18.0"
    );

    $response = PayUPayments::doAuthorizationAndCapture($parameters);

    $this->assertEquals('SUCCESS', $response->code);
    $this->assertObjectHasAttribute('transactionResponse', $response);
    $this->assertObjectHasAttribute('orderId', $response->transactionResponse);
    $this->assertObjectHasAttribute('transactionId', $response->transactionResponse);
    $this->assertObjectHasAttribute('state', $response->transactionResponse);
    $this->assertEquals('DECLINED', $response->transactionResponse->state);
    $this->assertObjectHasAttribute('responseCode', $response->transactionResponse);
  }
}
