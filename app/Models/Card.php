<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable=['user_id','card_number','card_holder_name','card_holder_year','card_holder_month','cvv'];
}
