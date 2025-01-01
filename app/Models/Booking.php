<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    use HasFactory;
    protected $fillable = [
        'field_id',
        'name',
        'email',
        'phone',
        'date',
        'start',
        'end',
        'order_id',
    ];
    public function room()
    {
        return $this->hasOne('App\Models\Lapangan', 'id', 'field_id');
    }
}
