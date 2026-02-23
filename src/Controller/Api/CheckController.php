<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use App\Model\Api\CheckModel;

final class CheckController extends AbstractController
{
    #[Route('/api/check/month/{id}')]
    public function getMonthDay(int $id): JsonResponse
    {
        $monthDays = CheckModel::getCheckMonthDay($id);

        $arMonths = ['1' => 'Января','2' => 'Февраля','3' => 'Марта','4' => 'Апреля','5' => 'Мая','6' => 'Июня','7' => 'Июля','8' => 'Августа','9' => 'Сентября', '10' => 'Октября','11' => 'Ноября','12' => 'Декабря'];

        return $this->json([
            'message' => $monthDays,
            'description' => "Сегодня $monthDays $arMonths[$id]"
        ]);
    }

    #[Route('/api/check/together/')]
    public function getDaysTogether(): JsonResponse
    {
        $today = new \DateTime();
        $startDate = new \DateTime('2025-05-12');

        $dayDiff = $today->diff($startDate)->days + 1;

        return $this->json([
            'message' =>  "Мы вместе: ".$dayDiff." дней \n(столько дней прошло с даты первого стрита: 12 мая 2025)",
        ]);
    }
}
