<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class StatusEnum extends Enum
{
    const Avaliable =   'avaliable';
    const Unavaliable =   'unavaliable';
    const Pending = 'pending';
}
