<?php


namespace App\Util\Constants;


class AppConstants
{
    const Pending = 'Pending';
    const Recorded = 'Recorded';
    const Rated = 'Rated';

    public static $status=[
        self::Pending => self::Pending,
        self::Recorded => self::Recorded,
        self::Rated => self::Rated,
    ];
}
