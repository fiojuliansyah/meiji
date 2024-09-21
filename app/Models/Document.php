<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'name',
        'validate_date',
        'image_url',
        'image_public_id',
    ];

    /**
     * Relasi inverse ke User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
