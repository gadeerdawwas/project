<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReadingChecker extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'reading_checker';

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
        'title',
        'body',
        'admin_id',
        'school_id'
    ];


}
