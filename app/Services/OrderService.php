<?php
namespace App\Services;

use App\Dto\OrderCreateDto;
use App\Helpers\FunctionResult;
use App\Services\Retailcrm\RetailcrmSearchService;
use App\Services\Retailcrm\RetailcrmService;

class OrderService
{
    private RetailcrmSearchService $retailcrmSearchService;
    private RetailcrmService $retailcrmService;

    public function __construct(RetailcrmSearchService $retailcrmSearchService, RetailcrmService $retailcrmService)
    {
        $this->retailcrmSearchService = $retailcrmSearchService;
        $this->retailcrmService = $retailcrmService;
    }

    public function create(OrderCreateDto $orderCreateDto): FunctionResult
    {
        $article = $orderCreateDto->getArticle();
        $manufacturer = $orderCreateDto->getManufacturer();
        $product = $this->retailcrmSearchService->searchProduct($article, $manufacturer);

        if (!$product->isSuccess()) {
            return $product;
        }
        $product = $product->getReturnValue();
        $products = [
            [
                'offer' => [
                    'id' => $product['id']
                ]
            ]
        ];

        $order = $this->retailcrmService->order($orderCreateDto, $products);
        if (!$order->isSuccess()) {
            return $order;
        }

        return FunctionResult::success('Заказ успешно создан');
    }
}
