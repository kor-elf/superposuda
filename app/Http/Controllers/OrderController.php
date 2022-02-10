<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\OrderRequest;
use App\Services\OrderService;

class OrderController extends Controller
{
    public function form(): View
    {
        return view('order.form', [

        ]);
    }

    public function store(OrderRequest $request, OrderService $orderService): RedirectResponse
    {
        $orderServiceResult = $orderService->create($request->getDto());
        if (!$orderServiceResult->isSuccess()) {
            return redirect()->back()->withInput()->withErrors($orderServiceResult->getErrorMessage());
        }

        return redirect()->route('order.form')->withSuccess('Заказ успешно отправлен');
    }
}
