<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Passenger extends Model
{
    use HasFactory;

    protected $fillable=['booking_id','first_name','last_name','age',
        'document_type','document_number','citizenship','additional_baggage','animal_type','equipment','user_mobility'];


    public function reservations(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Reservation::class,'booking_id');
    }
}
