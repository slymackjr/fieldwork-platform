<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'employers';

    // Define the primary key for the table
    protected $primaryKey = 'employerID';

    // Indicate if the IDs are auto-incrementing
    public $incrementing = true;

    // Define the data type of the primary key
    protected $keyType = 'bigint';

    // Define the attributes that are mass assignable
    protected $fillable = [
        'companyName',
        'officeID',
        'supervisorName',
        'supervisorPhone',
        'supervisorEmail',
        'supervisorPassword',
        'supervisorPosition',
        'supervisorSignature',
        'Muhuri',
        'fieldworkTitle',
        'fieldworkDescription',
    ];
}
