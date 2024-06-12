<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Employer extends Model implements AuthenticatableContract
{
    use Authenticatable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employers';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'employerID';

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
        'companyName',
        'officeID',
        'supervisorName',
        'supervisorPhone',
        'supervisorEmail',
        'password',
        'supervisorPosition',
        'supervisorSignature',
        'Muhuri',
        'fieldworkTitle',
        'fieldworkDescription',
        'applicationDeadline',
        'TIN' // Add TIN to fillable
    ];

    protected $casts = [
        'employerID' => 'int',
        'companyName' => 'string',
        'officeID' => 'int',
        'supervisorName' => 'string',
        'supervisorPhone' => 'string',
        'supervisorEmail' => 'string',
        'password' => 'string',
        'supervisorPosition' => 'string',
        'supervisorSignature' => 'string',
        'Muhuri' => 'string',
        'fieldworkTitle' => 'string',
        'fieldworkDescription' => 'string',
        'applicationDeadline' => 'date',
        'TIN' => 'string' // Add TIN to casts
    ];

    public $timestamps = true;

    public function fieldworks()
    {
        return $this->hasMany(Fieldwork::class, 'employerID', 'employerID');
    }

    public function logBooks()
    {
        return $this->hasMany(LogBook::class, 'employerID', 'employerID');
    }
}
