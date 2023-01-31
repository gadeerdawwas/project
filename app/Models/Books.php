<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;


    protected $table = 'books';

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

    // protected $fillable = [
    //     'school_id',
    //     'file_id',
    //     'title',
    //     'category',
    //     'author',
    //     'page_number',
    //     'ISBN',
    //     'Publishing_House',
    //     'copy',
    //     'challenge',
    // ];

     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<string>
     */
    protected $hidden = [
        //'created_at',
    ];

    /**
     * Get the Category that owns the file.
     */
    public function Category()
    {
        return $this->belongsTo(Categorie::class,'category');
    }
    public function School()
    {
        return $this->belongsTo(School::class,'school_id');
    }


    /**
     * Get the Category that owns the file.
     */
    public function File()
    {
        return $this->belongsTo(File::class);
    }

}
