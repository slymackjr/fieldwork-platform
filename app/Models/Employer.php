<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model implements Authenticatable
{
    use AuthenticatableTrait;

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
    protected $primaryKey = 'email';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $casts = [
        'email' => 'string',
        'password' => 'string',
    ];

    public $timestamps = false;

    public static $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:staff,email',
        'password' => 'required|confirmed',
        // Add more rules as needed
    ];
}
