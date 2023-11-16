<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\biayaKepegawaianBop;
use App\Models\Employees;
use App\Models\pemasukanBop;
use App\Models\rekapLaporan;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // rekapLaporan::factory(350)->create();
        biayaKepegawaianBop::factory(150)->create();
        // pemasukanBop::factory(50)->create();
        // Employees::factory(150)->create();
    }
}
