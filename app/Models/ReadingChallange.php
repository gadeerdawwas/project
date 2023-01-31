<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReadingChallange extends Model
{
    use HasFactory;

    protected $table = 'reading_challange';

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
        'school_id',
        'student_id',
        'superviser_name' ,
        'writer_name' ,
        'publishing_house' ,
        'pages' ,
        'summary' ,
        'state' ,
        'complete_date'
    ];

    public function Student()
    {
       return $this->belongsTo(Student::class);
    }
}
