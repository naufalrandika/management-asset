<?php

namespace Database\Seeders;

use App\Models\MasterJenis;
use App\Models\MasterKeadaan;
use App\Models\MasterLokasi;
use App\Models\MasterStatus;
use Illuminate\Database\Seeder;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@material.com',
            'password' => ('secret')
        ]);
        
        MasterJenis::factory()->create([
            'jenis' => 'Bangunan',
        ]);

        MasterKeadaan::factory()->create([
            'keadaan' => 'Baik',
        ]);

        MasterStatus::factory()->create([
            'status' => 'Aktif',
        ]);

        MasterLokasi::factory()->create([
            'lokasi' => 'Situs Prahu Kuno',
        ]);
    }
}
