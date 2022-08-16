<?php

namespace App\Policies;


use App\Models\User;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReservationPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function edit_reservation_permission(User $user,Reservation $reservation){
        return auth()->check() && $user == $reservation->user ;
    }
}
