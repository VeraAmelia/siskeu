<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\pemasukanBop>
 */
class pemasukanBopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uraian' => $this->faker->word,
            'tanggal' => $this->faker->date,
            'jumlahusulan' => $this->faker->numberBetween(100000, 10000000),
            'jumlahrealisasi' => $this->faker->numberBetween(100000, 10000000),
            'jumlahsisa' => $this->faker->numberBetween(100000, 10000000),
            'petugas' => $this->faker->word,
            'keterangan' => $this->faker->sentence,

        ];
    }
}
