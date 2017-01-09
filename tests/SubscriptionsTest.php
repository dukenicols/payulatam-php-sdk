<?php

namespace PayU;
use PayU\Util\Parameters as PayUParameters;
use PayU\Api\Countries as PayUCountries;
use PayU\SubscriptionPlans as PayUSubscriptionPlans;

class SubscriptionsTest extends TestCase
{
  public static $accountId = "512321";
  public function testCreate()
  {
    self::authorizeFromEnv();
    $description = "Sample Plan 001";
    $planCode    = "sample-plan-code-001";
    $parameters = array(
    	// Ingresa aquí la descripción del plan
    	PayUParameters::PLAN_DESCRIPTION => $description,
    	// Ingresa aquí el código de identificación para el plan
    	PayUParameters::PLAN_CODE => $planCode,
    	// Ingresa aquí el intervalo del plan
    	//DAY||WEEK||MONTH||YEAR
    	PayUParameters::PLAN_INTERVAL => "MONTH",
    	// Ingresa aquí la cantidad de intervalos
    	PayUParameters::PLAN_INTERVAL_COUNT => "1",
    	// Ingresa aquí la moneda para el plan
    	PayUParameters::PLAN_CURRENCY => "COP",
    	// Ingresa aquí el valor del plan
    	PayUParameters::PLAN_VALUE => "10000",
    	//(OPCIONAL) Ingresa aquí el valor del impuesto
    	PayUParameters::PLAN_TAX => "1600",
    	//(OPCIONAL) Ingresa aquí la base de devolución sobre el impuesto
    	PayUParameters::PLAN_TAX_RETURN_BASE => "8400",
    	// Ingresa aquí la cuenta Id del plan
    	PayUParameters::ACCOUNT_ID => self::$accountId,
    	// Ingresa aquí el intervalo de reintentos
    	PayUParameters::PLAN_ATTEMPTS_DELAY => "1",
    	// Ingresa aquí la cantidad de cobros que componen el plan
    	PayUParameters::PLAN_MAX_PAYMENTS => "12",
    	// Ingresa aquí la cantidad total de reintentos para cada pago rechazado de la suscripción
    	PayUParameters::PLAN_MAX_PAYMENT_ATTEMPTS => "3",
    	// Ingresa aquí la cantidad máxima de pagos pendientes que puede tener una suscripción antes de ser cancelada.
    	PayUParameters::PLAN_MAX_PENDING_PAYMENTS => "1",
    	// Ingresa aquí la cantidad de días de prueba de la suscripción.
    	PayUParameters::TRIAL_DAYS => 0,
    );

    $response = PayUSubscriptionPlans::create($parameters);
    $this->assertObjectHasAttribute("id", $response);
    $this->assertObjectHasAttribute("planCode", $response);
    $this->assertEquals($planCode, $response->planCode);
    $this->assertObjectHasAttribute("description", $response);
    $this->assertEquals($description, $response->description);
    $this->assertObjectHasAttribute("accountId", $response);

    $this->assertEquals(self::$accountId, $response->accountId);
    $this->assertObjectHasAttribute("intervalCount", $response);
    $this->assertEquals(1, $response->intervalCount);

    $this->assertObjectHasAttribute("interval", $response);
    $this->assertEquals("MONTH", $response->interval);

    $this->assertObjectHasAttribute("maxPaymentsAllowed", $response);
    $this->assertEquals(12, $response->maxPaymentsAllowed);

    $this->assertObjectHasAttribute("maxPaymentAttempts", $response);
    $this->assertEquals(3, $response->maxPaymentAttempts);

    $this->assertObjectHasAttribute("paymentAttemptsDelay", $response);
    $this->assertEquals(1, $response->paymentAttemptsDelay);

    $this->assertObjectHasAttribute("maxPendingPayments", $response);
    $this->assertEquals(1, $response->maxPendingPayments);

    $this->assertObjectHasAttribute("trialDays", $response);
    $this->assertEquals(0, $response->trialDays);
    $this->assertObjectHasAttribute("additionalValues", $response);
  }

  public function testUpdate()
  {
    $description = "New Sample Plan 001";
    $planCode    = "sample-plan-code-001";
    self::authorizeFromEnv();
    $parameters = array(
    	// Ingresa aquí la descripción del plan
    	PayUParameters::PLAN_DESCRIPTION => "New Sample Plan 001",
    	// Ingresa aquí el código de identificación para el plan
    	PayUParameters::PLAN_CODE => "sample-plan-code-001",
    	// Ingresa aquí la moneda para el plan
    	PayUParameters::PLAN_CURRENCY => "COP",
    	// Ingresa aquí el valor del plan
    	PayUParameters::PLAN_VALUE => "10000",
    	//(OPCIONAL) Ingresa aquí el valor del impuesto
    	PayUParameters::PLAN_TAX => "0",
    	//(OPCIONAL) Ingresa aquí la base de devolución sobre el impuesto
    	PayUParameters::PLAN_TAX_RETURN_BASE => "0",
    	// Ingresa aquí el intervalo de reintentos
    	PayUParameters::PLAN_ATTEMPTS_DELAY => "1",
    	// Ingresa aquí la cantidad total de reintentos para cada pago rechazado de la suscripción
    	PayUParameters::PLAN_MAX_PAYMENT_ATTEMPTS => "3",
    	// Ingresa aquí la cantidad máxima de pagos pendientes que puede tener una suscripción antes de ser cancelada.
    	PayUParameters::PLAN_MAX_PENDING_PAYMENTS => "1",
    );

    $response = PayUSubscriptionPlans::update($parameters);

    $this->assertObjectHasAttribute("id", $response);
    $this->assertObjectHasAttribute("planCode", $response);
    $this->assertEquals($planCode, $response->planCode);
    $this->assertObjectHasAttribute("description", $response);
    $this->assertEquals($description, $response->description);
    $this->assertObjectHasAttribute("accountId", $response);

    $this->assertEquals(self::$accountId, $response->accountId);
    $this->assertObjectHasAttribute("intervalCount", $response);
    $this->assertEquals(1, $response->intervalCount);

    $this->assertObjectHasAttribute("interval", $response);
    $this->assertEquals("MONTH", $response->interval);

    $this->assertObjectHasAttribute("maxPaymentsAllowed", $response);
    $this->assertEquals(12, $response->maxPaymentsAllowed);

    $this->assertObjectHasAttribute("maxPaymentAttempts", $response);
    $this->assertEquals(3, $response->maxPaymentAttempts);

    $this->assertObjectHasAttribute("paymentAttemptsDelay", $response);
    $this->assertEquals(1, $response->paymentAttemptsDelay);

    $this->assertObjectHasAttribute("maxPendingPayments", $response);
    $this->assertEquals(1, $response->maxPendingPayments);

    $this->assertObjectHasAttribute("trialDays", $response);
    $this->assertEquals(0, $response->trialDays);
    $this->assertObjectHasAttribute("additionalValues", $response);
  }

  public function testFind()
  {
    $description = "New Sample Plan 001";
    $planCode    = "sample-plan-code-001";
    self::authorizeFromEnv();
    $parameters = array(
    	// Ingresa aquí el código de identificación para el plan
    	PayUParameters::PLAN_CODE => $planCode,
    );

    $response = PayUSubscriptionPlans::find($parameters);
    $this->assertObjectHasAttribute("id", $response);
    $this->assertObjectHasAttribute("planCode", $response);
    $this->assertEquals($planCode, $response->planCode);
    $this->assertObjectHasAttribute("description", $response);
    $this->assertEquals($description, $response->description);
    $this->assertObjectHasAttribute("accountId", $response);

    $this->assertEquals(self::$accountId, $response->accountId);
    $this->assertObjectHasAttribute("intervalCount", $response);
    $this->assertEquals(1, $response->intervalCount);

    $this->assertObjectHasAttribute("interval", $response);
    $this->assertEquals("MONTH", $response->interval);

    $this->assertObjectHasAttribute("maxPaymentsAllowed", $response);
    $this->assertEquals(12, $response->maxPaymentsAllowed);

    $this->assertObjectHasAttribute("maxPaymentAttempts", $response);
    $this->assertEquals(3, $response->maxPaymentAttempts);

    $this->assertObjectHasAttribute("paymentAttemptsDelay", $response);
    $this->assertEquals(1, $response->paymentAttemptsDelay);

    $this->assertObjectHasAttribute("maxPendingPayments", $response);
    $this->assertEquals(1, $response->maxPendingPayments);

    $this->assertObjectHasAttribute("trialDays", $response);
    $this->assertEquals(0, $response->trialDays);
    $this->assertObjectHasAttribute("additionalValues", $response);

  }

  public function testDelete() {
    self::authorizeFromEnv();
    $parameters = array(
    	// Ingresa aquí el código de identificación para el plan
    	PayUParameters::PLAN_CODE => "sample-plan-code-001",
    );
    $response = PayUSubscriptionPlans::delete($parameters);
    $this->assertTrue($response);
  }

}
