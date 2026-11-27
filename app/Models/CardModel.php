<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CardModel extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'code',
        'is_blank',
        'description',
        'price_cents',
        'is_active',
    ];

    /**
     * Get the attributes that should be cast.
     * @return array<string, string>
    */
    protected function casts() :array
    {
        return [
            'is_blank' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Get the images that belong to the card model.
     * @return HasMany
    */
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
