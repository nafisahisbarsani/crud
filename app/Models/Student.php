<?php

namespace App\Models;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Department;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\BelongTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory; //Searchable;
    protected $fillable = [
        'name',
        'email',
        'department_id',
        'grade_id',
        'address'
    ];
    protected $with = ['grade', 'department'];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
