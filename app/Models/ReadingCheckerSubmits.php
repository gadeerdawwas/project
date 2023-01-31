<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReadingCheckerSubmits extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'reading_checker_submits';

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
        'checker_id',
        'student_id',
        'school_id',
        'file_id',
        'total_processed_words',
        'correct_words',
        'total_time_seconds',
        'is_processed',
        'processed_text'
    ];
}
