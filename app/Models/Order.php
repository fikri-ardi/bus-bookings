<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getStartRentDateAttribute()
    {
        return date('Y-m-d', strtotime($this->attributes['start_rent_date']));
    }

    public function getDatedMYAttribute()
    {
        return date('d M Y', strtotime($this->attributes['start_rent_date']));
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}