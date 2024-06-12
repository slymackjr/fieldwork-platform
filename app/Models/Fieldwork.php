<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Fieldwork extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fieldworks';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'fieldworkID';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'int';

    protected $fillable = [
        'employerID',
        'studentID',
        'status',
        'confirmed'
    ];

    protected $casts = [
        'fieldworkID' => 'int',
        'employerID' => 'int',
        'studentID' => 'int',
        'status' => 'string',
        'confirmed' => 'string',
    ];

    public $timestamps = true;

    public function employer()
    {
        return $this->belongsTo(Employer::class, 'employerID', 'employerID');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'studentID', 'studentID');
    }

    public function studentHasConfirmed()
{
    return Fieldwork::where('studentID', $this->studentID)
        ->where('confirmed', 'yes')
        ->exists();
}

    public function isExpired()
    {
        return $this->employer->applicationDeadline < Carbon::today() && !$this->studentHasConfirmed();
    }

}
