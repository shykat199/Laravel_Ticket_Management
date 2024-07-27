<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusCompany extends Model
{
    use HasFactory;

    protected $fillable = ['bus_company', 'status'];

    public function busDetails(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(BusDetails::class);
    }

    public function busDestination(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(BusDetails::class, BusDestination::class);
    }

}
