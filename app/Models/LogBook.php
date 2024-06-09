<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogBook extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'log_books';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'logID';

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
        // Add fields for each day if needed
    ];

    protected $casts = [
        'logID' => 'int',
        'employerID' => 'int',
        'studentID' => 'int',
        'status' => 'string',
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
}
