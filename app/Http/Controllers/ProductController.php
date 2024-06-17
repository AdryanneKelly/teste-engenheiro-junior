<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $produtos = Product::all();
        return response()->json($produtos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request): JsonResponse
    {
        try {
            $product = Product::create($request->validated());
            return response()->json($product, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao criar o produto.'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): JsonResponse
    {
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product): JsonResponse
    {
        try {
            $product->update($request->validated());
            return response()->json($product);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao atualizar o produto.'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): JsonResponse
    {
        $product->delete();
        return response()->json(['message' => 'Produto excluído com sucesso!']);
    }
}
