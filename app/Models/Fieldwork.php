<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fieldwork extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employerID',
        'studentID',
        'status',
    ];

    /**
     * Get the employer that owns the fieldwork.
     */
    public function employer()
    {
        return $this->belongsTo(Employer::class, 'employerID');
    }

    /**
     * Get the student that owns the fieldwork.
     */
    public function student()
    {
        return $this->belongsTo(Student::class, 'studentID');
    }
}
