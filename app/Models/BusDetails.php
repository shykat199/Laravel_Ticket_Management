<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusDetails extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'bus_coach', 'bus_type', 'bus_seat', 'status'];

    public function busCompany(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BusCompany::class, 'company_id');
    }

    public function busDestination(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(BusDestination::class);
    }
}
