<?php
namespace App\Services\Retailcrm;

use App\Helpers\FunctionResult;

class RetailcrmSearchService extends RetailcrmBase
{
    public function searchProduct(string $nameOrArticle, string $manufacturer): FunctionResult
    {
        try {
            $params = [
                'filter' => [
                    'name' => $nameOrArticle,
                    'manufacturer' => $manufacturer
                ]
            ];
            $link = '/api/v5/store/products';
            $result = $this->send($link, $params);
        } catch (\Throwable $th) {
            return FunctionResult::error('Ошибка, не смогли получить данные товара');
        }

        if (!$result['success']) {
            return FunctionResult::error('Ошибка, не смогли получить данные товара');
        }

        $product = $result['products'][0]['offers'][0] ?? null;
        if (!$product) {
            return FunctionResult::error('Данный товар не смогли найти');
        }

        return FunctionResult::success($product);
    }
}
