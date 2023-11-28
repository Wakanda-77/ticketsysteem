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
            'image'=> $faker->imageurl(),
            'date' => fake()->dateTimeBetween('-10 days', '+30 days', null),
            'time' => fake()->time(),
            'location' => 'ergens', // password
            'discription' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsam culpa, sequi molestiae sapiente rerum aspernatur, facilis quidem, itaque magnam libero quo doloribus harum pariatur ratione voluptates necessitatibus ipsum at neque.
            ',
        ];
    }
}
