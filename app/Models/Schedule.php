<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
      protected $fillable = [
        'applicant_id',
        'career_id',
        'date',
        'time',
        'description',
        'image_public_id',
    ];
    
   public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function career()
    {
        return $this->belongsTo(Career::class);
    }

}