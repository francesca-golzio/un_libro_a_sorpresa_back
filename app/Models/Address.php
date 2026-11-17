<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'recipient_name',
        'country',
        'region',
        'city',
        'postal_code',
        'street',
        'street_number',
        'address_line_2',
        'phone',
        'is_default_shipping',
        'is_default_billing',
    ];
        
    /**
     * Get the attributes that should be cast.
     * @return array<string, string>
    */
    protected function casts(): array
    {
        return [
            'is_default_shipping' => 'boolean',
            'is_default_billing' => 'boolean',
        ];
    }

    /**
     * Get the user that owns the address.
     * @return BelongsTo
    */
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
