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

    /**
     * Check if a student has already applied for a specific employer.
     *
     * @param int $employerID
     * @param int $studentID
     * @return bool
     */
    public static function hasApplied($employerID, $studentID)
    {
        return static::where('employerID', $employerID)
            ->where('studentID', $studentID)
            ->exists();
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class, 'employerID', 'employerID');
    }

    /**
     * Check if the current date has passed the application deadline of the associated employer.
     *
     * @return bool
     */
    public function hasPassedDeadline()
    {
        // Get the current date
        $currentDate = now();

        // Compare the application deadline of the associated employer with the current date
        return $this->employer->applicationDeadline < $currentDate;
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

    /**
     * Check if the fieldwork is confirmed, accepted, and the deadline has passed.
     *
     * @return bool
     */
    public function meetsCriteria()
    {
        // Check if the status is accepted and confirmed is yes
        if ($this->status === 'accepted' && $this->confirmed === 'yes') {
            // Use the hasPassedDeadline method from the employer model
            return $this->employer->hasPassedDeadline();
        }

        return false;
    }

}
