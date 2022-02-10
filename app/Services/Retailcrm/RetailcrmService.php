<?php
namespace App\Services\Retailcrm;

use App\Helpers\FunctionResult;
use App\Dto\OrderCreateDto;

class RetailcrmService extends RetailcrmBase
{
    public function order(OrderCreateDto $orderCreateDto, array $products): FunctionResult
    {
        try {
            $order = [
                'number' => 2011987,
                'status' => 'trouble',
                'orderType' => 'fizik',
                'orderMethod' => 'test',
                'lastName' => $orderCreateDto->getLastName(),
                'firstName' => $orderCreateDto->getFirstName(),
                'patronymic' => $orderCreateDto->getPatronymic(),
                'items' => $products,
                'customerComment' => $orderCreateDto->getComment()
            ];
            $params = [
                'site' => 'test',
                'order' => json_encode($order),
            ];

            $link = '/api/v5/orders/create';
            $result = $this->sendPost($link, $params);
        } catch (\Throwable $th) {
            return FunctionResult::error('Ошибка, не смогли создать заказ');
        }


        if (!$result['success']) {
            return FunctionResult::error('Ошибка, не смогли создать заказ');
        }

        return FunctionResult::success($result);
    }
}
