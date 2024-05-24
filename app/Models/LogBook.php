<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'employer_id',
        // Fillable fields for each day (day_1 to day_40) can be added here if needed
    ];

    // Define relationships
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}
