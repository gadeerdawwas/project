<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function Classes()
    {
        return $this->hasMany(Classes::class ,'classroom');
    }

}
