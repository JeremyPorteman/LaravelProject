<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    public function definition()
    {
        return [
            'client_id' => $this->faker->randomDigitNotNull,
            'purchase_order_id' => $this->faker->randomDigitNotNull,
            'total_amount' => $this->faker->randomFloat(2, 100, 1000),
            'amount_before_tax' => $this->faker->randomFloat(2, 80, 900),
            'tax' => $this->faker->randomFloat(2, 10, 100),
            'send_at' => $this->faker->dateTime,
            'acquitted_at' => $this->faker->dateTime,
        ];
    }
}
