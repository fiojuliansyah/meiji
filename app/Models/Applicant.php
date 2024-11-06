<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'career_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function career()
    {
        return $this->belongsTo(Career::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
