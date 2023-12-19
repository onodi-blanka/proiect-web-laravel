<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponsorsPartners extends Model
{
    protected $fillable = ['name', 'type', 'details', 'logo_path'];
}
