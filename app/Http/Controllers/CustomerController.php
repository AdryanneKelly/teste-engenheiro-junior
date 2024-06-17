<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $customers = Customer::all();
        return response()->json($customers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request): JsonResponse
    {
        try {
            $customer = Customer::create($request->validated());
            return response()->json($customer, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao criar o cliente.'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer): JsonResponse
    {
        return response()->json($customer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, Customer $customer): JsonResponse
    {
        try {
            $customer->update($request->validated());
            return response()->json($customer);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao atualizar o cliente.'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer): JsonResponse
    {
        $customer->delete();
        return response()->json(['message' => 'Cliente deletado com sucesso.']);
    }
}
