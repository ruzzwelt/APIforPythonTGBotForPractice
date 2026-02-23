<?php

namespace App\Model\Api;


final class CheckModel
{

    public static function getCheckMonthDay(int $month): string
    {
        $today = new \DateTime();
        $year = $today->format('Y');

        if ( (int)$today->format('m') < $month ) {
            $year--;
        }

        $lastMonth = new \DateTime(
            $year.'-'.$month.'-01'
        );

        return $today->diff($lastMonth)->days + 1;
    }

    public static function getDaysTogether(
        \DateTime $today = new \DateTime(),
        \DateTime $startDate = new \DateTime('2025-05-12')
    ): int|false
    {
        return $today->diff($startDate)->days + 1;
    }

    public static function checkTrue(): bool
    {
        return true;
    }

    public static function checkText(): string
    {
        return "text to check if method Api\Model\CheckModel::checkText() works. And yeah. It does!";
    }


}
