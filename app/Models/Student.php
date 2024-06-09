<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Student extends Model implements AuthenticatableContract
{
    use Authenticatable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'students';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'studentID';

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
        'studentName',
        'registrationID',
        'studentEmail',
        'studentPhone',
        'password',
        'course',
        'studyYear',
        'currentGPA',
        'introductionLetter',
        'resultSlip',
        'university'
    ];

    protected $casts = [
        'studentID' => 'int',
        'studentName' => 'string',
        'registrationID' => 'string',
        'studentEmail' => 'string',
        'studentPhone' => 'string',
        'password' => 'string',
        'course' => 'string',
        'studyYear' => 'int',
        'currentGPA' => 'float',
        'introductionLetter' => 'string',
        'resultSlip' => 'string',
        'university' => 'string',
    ];

    public $timestamps = true;

    public function fieldworks()
    {
        return $this->hasMany(Fieldwork::class, 'studentID', 'studentID');
    }

    public function logBooks()
    {
        return $this->hasMany(LogBook::class, 'studentID', 'studentID');
    }
}
