<?php

namespace App\Payment;

use App\Payment\Contracts\RequestContract;
use App\Payment\Exceptions\GatewayNotFoundException;

class PaymentService
{
    public const IDPAY = 'IDPay';
    public const ZARINPAL = 'Zarinpal';

    public function __construct(protected string $gateway, protected RequestContract $request)
    {
        //
    }

    public function pay()
    {
        return $this->findGateway()->pay();
    }

    public function verify()
    {
        return $this->findGateway()->verify();
    }

    protected function findGateway()
    {
        $gateway = "App\Payment\Gateways\\{$this->gateway}";

        if (!class_exists($gateway)) {
            throw new GatewayNotFoundException("Gateway {$this->gateway} not found");
        }

        return new $gateway($this->request);
    }
}
