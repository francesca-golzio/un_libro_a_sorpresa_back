<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'isbn',
        'publisher',
        'publication_year'
    ];

    /**
     * Get the attributes that should be cast.
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'publication_year' => 'integer',
        ];
    }

    /**
     * Get the authors associated with the book.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany|\App\Models\Author[]
     */
    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    /**
     * Get the tags associated with the book.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany|\App\Models\Tag[]
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Get the digital expansions associated with the book.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|\App\Models\DigitalExpansion[]
     */
    public function DigitalExpansion()
    {
        return $this->hasMany(DigitalExpansion::class);
    }
}
