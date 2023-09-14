<?php

namespace Database\Factories;

use App\Models\MasterKeadaan;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterKeadaanFactory extends Factory
{
    protected $model = MasterKeadaan::class;

    public function definition()
    {
        return [
            'keadaan' => $this->faker->word,
        ];
    }
}
