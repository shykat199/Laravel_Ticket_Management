<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusCompany extends Model
{
    use HasFactory;
    protected $fillable=['bus_company','status'];
}
