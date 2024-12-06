<?php

namespace app\helpers;

use DateTime;
use Exception;
use \yii;

class HelperFunctions{

    public static function getDate()
    {
        date_default_timezone_set('America/Montevideo');
        $timestamp_of_date = time();

        $hourChange = 0;

        $new_hour = $timestamp_of_date + ($hourChange * 60 * 60);
        return date('Y-m-d H:i:s', $new_hour);
    }

}