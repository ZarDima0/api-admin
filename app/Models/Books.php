<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'name_books', 'description','year','author_id','genres_id'
    ];

    public function author ()
    {
        return $this->belongsTo(User::class);
    }

    public function genre ()
    {
        return $this->belongsTo(Genre::class);
    }
}
