<?php

namespace App\Models;

use App\Models\User;
use App\Models\Pitch;

use App\Models\Period;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable=[
        'res_date',
        'user_id',
        'pitch_id',
        'period_id',
    ];

    protected $dates=[
        'res_date',
    ];

    //relationship with user
    public function user(){
        return $this->belongsTo(User::class);
    }

        //relationship with pitch

    public function pitch(){
        return $this->belongsTo(Pitch::class);
    }

    //relationship with period

    public function period(){
        return $this->belongsTo(Period::class);
    }

}
