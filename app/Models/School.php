<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class School extends Authenticatable
{
    use HasFactory;


    protected $table = 'schools';

    /**
     * The primary key associated with the table.
     *
     * @var int
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string, string, string, string, string, string,>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'gender',
        'ministerialNumber',
        'phone',
        'school_avater'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<string>
     */
    protected $hidden = [
        'password',
    ];


}
