<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Customer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    protected $model = \App\Models\Customer::class;

    public function definition()
    {
        return [
            'operator' => $this->faker->name(),
            'client_number' => $this->faker->phoneNumber(),
            'date' => $this->faker->date(),
            'duration' => $this->faker->numberBetween(1, 120) . ' мин',
            'scenario' => $this->faker->randomElement(['A', 'B', 'C']), 
            'marker' => $this->faker->word(), 
            'rating' => $this->faker->numberBetween(1, 5), 
            'language' => $this->faker->randomElement(['Русский', 'Английский', 'Казахский']), 
            'loyalty' => $this->faker->boolean() ? 'Лоялен' : 'Не лоялен', 
            'beacon' => $this->faker->word(), 
            'interruptions' => $this->faker->numberBetween(0, 10) . ' раз', 
            'price' => $this->faker->randomFloat(2, 1000, 10000) . ' KZT', 
        ];
    }
}

