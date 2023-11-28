<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ticket;

class TicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->name,
            'price' => $this->faker->randomFloat(2, 10, 100), // Adjust the range as needed
            'reservations_id' => \App\Models\Reservation::factory(), // Assuming you have a Reservation model
        ];
    }
}
