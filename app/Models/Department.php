<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;



    protected $fillable = [
        'name',
        'description'
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
