<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'avatar_url', 'avatar_public_id', 'nik', 'address', 'gender', 'birth_place', 'birth_date'];

    /**
     * Relasi inverse ke User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
