<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teachers extends Authenticatable
{
    use HasFactory;

    protected $table = 'teachers';

    /**
     * The primary key associated with the table.
     *
     * @var int
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'school_id'
    ];
    public function School()
    {
        return $this->belongsTo(School::class);
    }

}
