<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $table = 'classes';

    /**
     * The primary key associated with the table.
     *
     * @var int
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, int>
     */
    protected $guarded=[];


     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<string>
     */
    protected $hidden = [
        //'created_at',
    ];
    public function Admin()
    {
        return $this->belongsTo(Admin::class,'admin_id');
    }
    public function Classroom()
    {
        return $this->belongsTo(Classroom::class,'classroom');
    }

}
