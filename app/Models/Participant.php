<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'contact_number', 'event_id'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
