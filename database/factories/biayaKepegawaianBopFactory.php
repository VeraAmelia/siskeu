<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\biayaKepegawaianBop>
 */
class biayaKepegawaianBopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $biayaOptions = [
            'Honorarium Kelas Khusus',
            'Uang Makan dan Transport',
            'BPJS Ketenagakerjaan',
            'BPJS Kesehatan',
            'Biaya Duka / Suka Cita',
            'Biaya Pengembangan SDM',
        ];

        return [
            'unsurbiaya' => $this->faker->randomElement($biayaOptions),
            'pengajuan' => $this->faker->numberBetween(100000, 10000000),
            'tanggal' => $this->faker->date,
            'keterangan' => $this->faker->sentence
        ];
    }
}
