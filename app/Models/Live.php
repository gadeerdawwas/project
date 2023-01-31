<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Live extends Model
{
    use HasFactory;

    protected $table = 'live';
    
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
        'school_id',
        'url',
        'active'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<string>
     */
    // protected $hidden = [
    //     'password',        
    // ];

}
