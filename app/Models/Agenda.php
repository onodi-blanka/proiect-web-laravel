<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    public $fillable = ['id', 'event_id', 'title', 'description', 'start_time', 'end_time'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
