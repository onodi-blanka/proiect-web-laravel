<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public $fillable = ['id','nume', 'descriere', 'locatie', 'data', 'price'];

    public function agenda()
    {
        return $this->hasMany(Agenda::class);
    }

    public function sponsorspartners()
    {
        return $this->hasMany(SponsorsPartners::class);
    }
}
