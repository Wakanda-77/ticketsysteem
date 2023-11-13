<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //Abdullllllllll
        $faker = app(\Faker\Generator::class);
        $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));
        return [
            'title' => fake()->name(),
            'imageurl'=> $faker->imageurl(),
            'date' => fake()->dateTimeBetween('-10 days', '+30 days', null),
            'time' => fake()->time(),
            'location' => 'test', // password
            'discription' => 'hallo world',
        ];
    }
}
