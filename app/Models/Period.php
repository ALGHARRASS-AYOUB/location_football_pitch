<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;


    protected $fillable=[
        'period_time',
    ];

        //relationship
        public function reservations(){
            return $this->hasMany(Reservation::class);
        }
}
