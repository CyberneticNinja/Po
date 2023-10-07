<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events'; // Specify the table name

    protected $fillable = [
        'event_name',
        'event_location',
        'event_datetime',
        'notes',
        'user_id',
    ];

    protected $dates = ['event_datetime'];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
