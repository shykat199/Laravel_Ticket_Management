<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageSeat extends Model
{
    use HasFactory;
    protected $fillable=['bus_id','user_id','seat_number','destinations_id'];
}
