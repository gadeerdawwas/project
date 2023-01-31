<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioRecoreds extends Model
{
    use HasFactory;
    
    protected $table = 'audioRecoreds';
    
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
        'file_id',
        'student_id',
        'book_id',
        'school_id',
        'approved',
    ];


}
