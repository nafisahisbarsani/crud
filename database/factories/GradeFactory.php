<?php

namespace Database\Factories;

use App\Models\Grade;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

class GradeFactory extends Factory
{
    protected $model = Grade::class;

    public function definition()
    {
        return [
            'grade' => $this->faker->word(),
            'department_id' =>  $this->faker->numberBetween(1,5),
        ];
    }
}
