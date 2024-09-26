<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'img_url', 'img_public_id'];

    public function careers()
    {
        return $this->hasMany(Career::class);
    }
}

