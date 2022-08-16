<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UserPolicy
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

    public function create(User $user){
        return Auth::check() && $user->role =='admin';
    }

    public function update(User $user){
        return Auth::check() && $user->role =='admin';

    }

    public function delete(User $user){
        return Auth::check() && $user->role =='admin';

    }

}
