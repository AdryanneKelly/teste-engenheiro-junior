<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\OrderRequest;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $orders = Order::all();
        return response()->json($orders);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request): JsonResponse
    {
        try {
            $validated = $request->validated();
            $order = Order::create($validated);

            foreach ($validated['items'] as $item) {
                $order->items()->create([
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                ]);
            }

            return response()->json($order->with('items')->find($order->id));
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order): JsonResponse
    {
        return response()->json($order->with('items')->find($order->id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, Order $order): JsonResponse
    {
        try {
            $validated = $request->validated();
            $order->update($validated);

            foreach ($validated['items'] as $item) {
                $order->items()->updateOrCreate([
                    'product_id' => $item['product_id'],
                ], [
                    'quantity' => $item['quantity'],
                ]);
            }

            return response()->json($order->with('items')->find($order->id));
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order): JsonResponse
    {
        $order->delete();
        return response()->json(['message' => 'Order deleted successfully!']);
    }
}
