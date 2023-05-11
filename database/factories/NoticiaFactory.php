<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker;
use App\Models\User;

class NoticiaFactory extends Factory
{
    // public static function generarNoticias($cantidad)
    // {
    //     $mocks = array();
    //     for($i = 0; $i < $cantidad; $i++) 
    //     {
    //         $mocks[] = NoticiaFactory::hacerNoticia();
    //     }
    //     return $mocks;
    // }

    public function definition(): array
    {
        $created = fake()->dateTimeBetween('-5 years');
        return [
            "titulo" => fake()->unique()->sentence,
            "cuerpo" => fake()->paragraphs(3, true),
            "imagen" => fake()->optional()->imageUrl(300, 300),
            'created_at' => $created,
            'updated_at' => fake()->dateTimeBetween($created),
            "autor" => User::all()->random()->id,
        ];
    }

    // public static function hacerNoticia()
    // {
    //     $faker = Faker\Factory::create();
    //     return (object) [
    //         "id" => $faker->randomNumber(2),
    //         "titulo" => $faker->sentence,
    //         "cuerpo" => $faker->paragraphs(3, true),
    //         "imagen" => $faker->imageUrl(300, 300),
    //         "autor" => $faker->name,
    //     ];
    // }
}
