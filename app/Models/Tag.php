<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    /**
     * Get the books associated with the tag.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany|\App\Models\Book[]
     */
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
