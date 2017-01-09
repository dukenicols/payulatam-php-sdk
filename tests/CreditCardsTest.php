<?php

namespace PayU;
use PayU\Util\Parameters as PayUParameters;
use PayU\CreditCards as PayUCreditCards;

class CreditCardTest extends TestCase
{
  public function testCreate()
  {
    self::authorizeFromEnv();
    $parameters = array(
    	// Ingresa aquí el identificador del cliente,
    	PayUParameters::CUSTOMER_ID => "743b0m2xq2bf",
    	// Ingresa aquí el nombre del cliente
    	PayUParameters::PAYER_NAME => "Pedro Pistolas",
    	// Ingresa aquí el número de la tarjeta de crédito
    	PayUParameters::CREDIT_CARD_NUMBER => "4242424242424242",
    	// Ingresa aquí la fecha de expiración de la tarjeta de crédito en formato AAAA/MM
    	PayUParameters::CREDIT_CARD_EXPIRATION_DATE => "2018/01",
    	// Ingresa aquí el nombre de la franquicia de la tarjeta de crédito
    	PayUParameters::PAYMENT_METHOD => "VISA",
            // Ingresa aquí el documento de identificación asociado a la tarjeta
    	PayUParameters::CREDIT_CARD_DOCUMENT => "1020304050",
    	// (OPCIONAL) Ingresa aquí el documento de identificación del pagador
    	PayUParameters::PAYER_DNI => "101010123",
    	// (OPCIONAL) Ingresa aquí la primera línea de la dirección del pagador
    	PayUParameters::PAYER_STREET => "Street 93B",
    	// (OPCIONAL) Ingresa aquí la segunda línea de la dirección del pagador
    	PayUParameters::PAYER_STREET_2 => "17 25",
    	// (OPCIONAL) Ingresa aquí la tercera línea de la dirección del pagador
    	PayUParameters::PAYER_STREET_3 => "Office 301",
    	// (OPCIONAL) Ingresa aquí la ciudad de la dirección del pagador
    	PayUParameters::PAYER_CITY => "Bogotá",
    	// (OPCIONAL) Ingresa aquí el estado o departamento de la dirección del pagador
    	PayUParameters::PAYER_STATE => "Bogotá D.C.",
    	// (OPCIONAL) Ingresa aquí el código del país de la dirección del pagador
    	PayUParameters::PAYER_COUNTRY => "CO",
    	// (OPCIONAL) Ingresa aquí el código postal de la dirección del pagador
    	PayUParameters::PAYER_POSTAL_CODE => "00000",
    	// (OPCIONAL) Ingresa aquí el número telefónico del pagador
    	PayUParameters::PAYER_PHONE => "300300300"
    );

    $response = PayUCreditCards::create($parameters);

    var_dump($response);
    die();
  }
}
