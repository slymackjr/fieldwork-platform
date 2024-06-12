<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'attendance';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'attendanceID';

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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employerID',
        'studentID',
        'day_1',
        'day_2',
        'day_3',
        'day_4',
        'day_5',
        'day_6',
        'day_7',
        'day_8',
        'day_9',
        'day_10',
        'day_11',
        'day_12',
        'day_13',
        'day_14',
        'day_15',
        'day_16',
        'day_17',
        'day_18',
        'day_19',
        'day_20',
        'day_21',
        'day_22',
        'day_23',
        'day_24',
        'day_25',
        'day_26',
        'day_27',
        'day_28',
        'day_29',
        'day_30',
        'day_31',
        'day_32',
        'day_33',
        'day_34',
        'day_35',
        'day_36',
        'day_37',
        'day_38',
        'day_39',
        'day_40',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'attendanceID' => 'int',
        'employerID' => 'int',
        'studentID' => 'int',
        'day_1' => 'string',
        'day_2' => 'string',
        'day_3' => 'string',
        'day_4' => 'string',
        'day_5' => 'string',
        'day_6' => 'string',
        'day_7' => 'string',
        'day_8' => 'string',
        'day_9' => 'string',
        'day_10' => 'string',
        'day_11' => 'string',
        'day_12' => 'string',
        'day_13' => 'string',
        'day_14' => 'string',
        'day_15' => 'string',
        'day_16' => 'string',
        'day_17' => 'string',
        'day_18' => 'string',
        'day_19' => 'string',
        'day_20' => 'string',
        'day_21' => 'string',
        'day_22' => 'string',
        'day_23' => 'string',
        'day_24' => 'string',
        'day_25' => 'string',
        'day_26' => 'string',
        'day_27' => 'string',
        'day_28' => 'string',
        'day_29' => 'string',
        'day_30' => 'string',
        'day_31' => 'string',
        'day_32' => 'string',
        'day_33' => 'string',
        'day_34' => 'string',
        'day_35' => 'string',
        'day_36' => 'string',
        'day_37' => 'string',
        'day_38' => 'string',
        'day_39' => 'string',
        'day_40' => 'string',
    ];

    /**
     * Get the employer that owns the attendance.
     */
    public function employer()
    {
        return $this->belongsTo(Employer::class, 'employerID', 'employerID');
    }

    /**
     * Get the student that owns the attendance.
     */
    public function student()
    {
        return $this->belongsTo(Student::class, 'studentID', 'studentID');
    }
}
