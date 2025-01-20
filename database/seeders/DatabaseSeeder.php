<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Department;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create([
            'name' => 'PPLG',
            'description' => 'Pengembangan Perangkat Lunak dan Gim, fokus pada pembuatan aplikasi dan permainan digital.',
        ]);

        Department::create([
            'name' => 'ANIMASI 3D',
            'description' => 'Jurusan yang berfokus pada teknik animasi tiga dimensi.',
        ]);

        Department::create([
            'name' => 'ANIMASI 2D',
            'description' => 'Jurusan yang mempelajari teknik animasi dua dimensi.',
        ]);

        Department::create([
            'name' => 'DKV TG',
            'description' => 'Desain Komunikasi Visual Tata Grafis, berfokus pada desain tata grafis.',
        ]);

        Department::create([
            'name' => 'DKV DG',
            'description' => 'Desain Komunikasi Visual Digital Grafis, berfokus pada pembuatan desain grafis digital.',
        ]);



        for ($level = 10; $level <= 12; $level++) {
            for ($section = 1; $section <= 2; $section++) {
                Grade::factory()->create([
                    'grade' => "{$level} PPLG {$section}",
                    'department_id' => 1,
                ]);
            }
        }

        for ($level = 10; $level <= 12; $level++) {
            for ($section = 1; $section <= 5; $section++) {
                if ($section > 3) {
                    Grade::factory()->create([
                        'grade' => "{$level} ANIM {$section}",
                        'department_id' => 3,
                    ]);
                } else {
                    Grade::factory()->create([
                        'grade' => "{$level} ANIM {$section}",
                        'department_id' => 2,
                    ]);
                }
            }
        }

        for ($level = 10; $level <= 12; $level++) {
            for ($section = 1; $section <= 5; $section++) {
                if ($section > 2) {
                    Grade::factory()->create([
                        'grade' => "{$level} DKV {$section}",
                        'department_id' => 4,
                    ]);
                } else {
                    Grade::factory()->create([
                        'grade' => "{$level} DKV {$section}",
                        'department_id' => 5,
                    ]);
                }
            }
        }


        Student::factory(100)->create();
    }
}
