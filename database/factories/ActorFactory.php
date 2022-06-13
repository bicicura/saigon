<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use App\Models\Actor;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ActorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'date_of_birth' => Carbon::today()->subDays(rand(0, 365)),
            'nacionalidad' => $this->faker->country(),
            'altura' => rand(150, 200),
            'bio' => $this->faker->realText(500),
            'imdb' => Str::random(10),
            'ig' => Str::random(10),
            'cv' => Str::random(10),
            'videos' => Str::random(10),
            'thumbnail' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}