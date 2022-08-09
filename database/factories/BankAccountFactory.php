<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BankAccount>
 */
class BankAccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name_on_account' => $this->faker->name(),
            'account_number' => $this->faker->randomNumber(8),
            'sort_code' => implode('-', str_split($this->faker->randomNumber(6), 2)),
            'card_number' => $this->faker->creditCardNumber(),
            'card_expiry' => $this->faker->creditCardExpirationDateString(),
            'card_cvc' => $this->faker->randomNumber(3),
        ];
    }
}
