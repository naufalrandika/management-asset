<?php

namespace Database\Factories;

use App\Models\MasterJenis;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterJenisFactory extends Factory
{
    protected $model = MasterJenis::class;

    public function definition()
    {
        return [
            'jenis' => $this->faker->word,
        ];
    }
}

