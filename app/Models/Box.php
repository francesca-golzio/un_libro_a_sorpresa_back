<?php

namespace App\Models;

use App\Enums\BoxType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Box extends Model
{
    use SoftDeletes;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'code',
        'slug',
        'type',
        'description',
        'price_cents',
        'is_active'
    ];

    /**
     * Get the attributes that should be cast.
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'type' => BoxType::class,
        ];
    }

    /**
     * Get the images that belong to the box.
     * @return HasMany
    */
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
