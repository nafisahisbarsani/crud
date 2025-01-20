<?php

// app/Models/Grade.php

namespace App\Models;
use App\Models\Student;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'grade',
        'department_id',
    ];
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
