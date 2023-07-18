<?php

namespace App\Services\Users;

class PhoneService
{
    const CITY_CODE_START = 1;
    const CITY_CODE_LENGTH = 3;
    const FIRST_PHONE_BLOCK_START = 4;
    const FIRST_PHONE_BLOCK_LENGTH = 3;
    const SECOND_PHONE_BLOCK_START = 7;
    const SECOND_PHONE_BLOCK_LENGTH = 4;

    public static function formatPhone(string $phone): string
    {
        $cityCode = substr($phone, self::CITY_CODE_START, self::CITY_CODE_LENGTH);
        $firstPhoneBlock = substr($phone, self::FIRST_PHONE_BLOCK_START, self::FIRST_PHONE_BLOCK_LENGTH);
        $secondPhoneBlock = substr($phone, self::SECOND_PHONE_BLOCK_START, self::SECOND_PHONE_BLOCK_LENGTH);

        return '+7 (' . $cityCode . ') ' . $firstPhoneBlock . ' ' . $secondPhoneBlock;
    }
}
