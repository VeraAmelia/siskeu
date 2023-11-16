<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PengajuanBop>
 */
class PengajuanBopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // return [
        //     'title' => $this->faker->title,
        //     'description' => $this->faker->text,
        // ];

         return [
        'unsurbiaya' => $this->faker->word,
        'pengajuan' => $this->faker->numberBetween(100000, 10000000),
        'keterangan' => $this->faker->sentence,
    ];
    }
}
