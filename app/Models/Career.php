<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'departement_id', 'level_id', 'name', 'salary', 'type_id', 'placement', 'experience', 'deadline_date', 'description', 'location_id'];

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
