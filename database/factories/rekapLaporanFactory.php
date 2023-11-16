<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\RekapLaporan;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\rekapLaporan>
 */
class rekapLaporanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $biayaOptions = [
            'Gaji pokok pegawai',
            'Uang lembur',
            'Uang kelebihan sks',
            'Tunjangan hari raya',
            'Perjalanan dinas',
            'Insentif',
            'BPJS Kesehatan',
            'Pengembangan SDM'
        ];

        $keteranganOptions = [
            'Gaji pokok pegawai',
            'Uang lembur',
            'Uang kelebihan sks',
            'Tunjangan hari raya',
            'Perjalanan dinas',
            'Insentif',
            'BPJS Kesehatan',
            'Pengembangan SDM'
        ];
    
        return [
            'biayakepegawaian' => $this->faker->randomElement($biayaOptions),
            'pengajuan' => $this->faker->numberBetween(100000, 10000000),
            'pelaksanaan' => $this->faker->numberBetween(100000, 10000000),
            'keterangan' => $this->faker->randomElement($keteranganOptions),
        ];
    }
}
