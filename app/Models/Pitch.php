<?php

namespace App\Models;

use App\Enums\StatusEnum;
use App\Models\Reservation;
use Composer\XdebugHandler\Status;
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

    protected $casts= [
        'status'=>StatusEnum::class,
    ];


    //relationship

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

}
