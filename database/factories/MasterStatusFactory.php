<?php

namespace Database\Factories;

use App\Models\MasterStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterStatusFactory extends Factory
{
    protected $model = MasterStatus::class;

    public function definition()
    {
        return [
            'status' => $this->faker->word,
        ];
    }
}
