<?php

namespace App\Casts;

use App\Helpers\Price;
use App\Services\RateService;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

class PriceJson implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        $data = json_decode($value);
        
        if (is_null($data)) {
            throw new InvalidArgumentException("the given value is null");
        }

        return new Price(
            $data->currency,
            $data->amount,
            app()->make(RateService::class)
        );
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return json_encode($value->toArray());
    }
}
