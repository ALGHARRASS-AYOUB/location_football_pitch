<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class DateRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $choosen_date=Carbon::parse($value);
        $last_date=Carbon::now()->addWeek();
        return ($choosen_date>= Carbon::now()->format('Y-m-d') && $choosen_date <= $last_date) ?? false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ' the date  you picked is not valid. please pick a valide one try {from '.Carbon::now()->format('Y-m-d').' to '.Carbon::now()->addWeek()->format('Y-m-d') .' }';
    }
}
