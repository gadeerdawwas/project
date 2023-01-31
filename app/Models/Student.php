<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;


    protected $table = 'students';

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
    // protected $fillable = [
    //     'name',
    //     'id_number',
    //     'password',
    //     'school_id',
    //     'class',
    //     'admin',
    // ];

    protected $guarded=[];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the Category that owns the file.
     */
    public function ClassName()
    {
        return $this->belongsTo(Classes::class,'class');
    }
    public function School()
    {
        return $this->belongsTo(School::class);
    }
    public function Admin()
    {
        return $this->belongsTo(Admin::class ,'admin');
    }


}
