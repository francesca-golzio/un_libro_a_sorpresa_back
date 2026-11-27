<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /** @use HasFactory<\Database\Factories\ImageFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'book_id',
        'box_id',
        'product_id',
        'packaging_option_id',
        'card_model_id',
        'path',
        'alt_text',
        'sort_order'
    ];

    /**
     * Get the book that owns the image.
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * Get the box that owns the image.
     */
    public function box()
    {
        return $this->belongsTo(Box::class);
    }

    /**
     * Get the product that owns the image.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the packaging option that owns the image.
     */
    public function packagingOption()
    {
        return $this->belongsTo(PackagingOption::class);
    }

    /**
     * Get the card model that owns the image.
     */
    public function cardModel()
    {
        return $this->belongsTo(CardModel::class);
    }
}
