<?php

namespace App\Helpers;

use App\Services\RateService;
use InvalidArgumentException;
use Illuminate\Contracts\Support\Arrayable;
use Stringable;

class Price implements Arrayable, Stringable
{
    private float $currency_rate;

    public function __construct(
        private readonly string $currency,
        private readonly float $amount,
        private readonly RateService $rateService,
    )
    {
        if (! $this->currencyExists($currency)) {
            throw new InvalidArgumentException('The currency doesn\'t exist');
        }

        $this->currency_rate = $currency_rate ?? $this->getCurrencyRate($this->currency);
    }

    private static function currencyExists($currency)
    {
        return str($currency)->length() === 3;
    }

    private function getCurrencyRate($currency)
    {
        return $this->rateService->getRateFromCurrency($currency);
    }

    public function fromEuros(float $price)
    {
        return new self('EUR', $price, app()->make(RateService::class));
    }

    public function toArray()
    {
        return [
            'amount' => $this->amount,
            'currency' => $this->currency,
            'currency_rate' => $this->currency_rate,
        ];
    }

    public function __toString()
    {
        return "$this->amount $this->currency";
    }
}
