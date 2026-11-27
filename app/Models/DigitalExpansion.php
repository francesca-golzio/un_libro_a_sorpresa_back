<?php

namespace App\Models;

use App\Enums\DigitalExpansionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Override;

class DigitalExpansion extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var array<int, string>
     */
    protected $fillable = [
        'book_id',
        'title',
        'type',
        'link',
        'file_path',
        'body',
    ];

    /**
     * The attributes that should be cast.
     * @var array<string, string>
     */
    protected function casts()
    {
        return [
            'type' => DigitalExpansionType::class,
        ];
    }

    /**
     * Get the book that owns the digital expansion.
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}