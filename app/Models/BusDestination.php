<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusDestination extends Model
{
    use HasFactory;

    protected $fillable = ['bus_details_id', 'starting_point', 'arrival_point', 'ticket_price', 'departure_time', 'arrival_time'];

//    public function busCompany()
//    {
//        return $this->belongsToThrough(BusCompany::class, BusDetails::class,'bus_details_id','company_id','id','id');
//    }


    public function busDetails(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BusDetails::class,'bus_details_id');
    }

}
