<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
    ];

    /**
     * Get the books associated with the author.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany|\App\Models\Book[]
     */
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
