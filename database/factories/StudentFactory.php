<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $grade = $this->faker->numberBetween(1, 36);

        return [
            'name' => $this->faker->name(),
            'grade_id' => $grade,
            'department_id' =>
                $grade <= 6 ? 1 : // PPLG
                (($grade - 7) % 5 < 3 && $grade <= 21 ? 2 : // ANIMASI 2D
                (($grade - 7) % 5 >= 3 && $grade <= 21 ? 3 : // ANIMASI 3D
                (($grade - 21) % 5 < 2 ? 5 : 4))), // DKV TG (grade 22-36, section < 2) dan DKV DG (section >= 2)
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->address(),
            
        ];
    }
}
