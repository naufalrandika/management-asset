<?php

namespace Database\Factories;

use App\Models\MasterLokasi;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterLokasiFactory extends Factory
{
    protected $model = MasterLokasi::class;

    public function definition()
    {
        return [
            'lokasi' => $this->faker->word,
        ];
    }
}
