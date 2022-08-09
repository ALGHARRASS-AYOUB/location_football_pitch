<?php

namespace App\Models;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pitch extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'location',
        'status',
        'places',
        'price',
    ];


    //relationship

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

}
