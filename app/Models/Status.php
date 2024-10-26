<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
        protected $fillable = [
        'status',
        'color',
        'is_dpass',
    ];


      public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
