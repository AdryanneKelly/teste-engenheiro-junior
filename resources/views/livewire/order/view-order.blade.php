<div class="w-full h-full">
    <div class="flex flex-col justify-center  w-full">
        <x-navbar />
        <div class="container mx-auto">
            <div class="flex flex-col items-center">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <form class="shadow-sm shadow-white rounded-xl px-10 pb-10 mt-10 mx-2">
                    <h1 class="mt-10 text-white w-auto md:w-[400px] lg:w-[550px] font-medium">Visualizar pedido</h1>
                    <select wire:model="selectedCustomer"
                        class="block w-full p-3 border rounded-lg mt-10 text-sm bg-gray-700 border-gray-600 placeholder-gray-400 text-white"
                        disabled>
                        <option value="{{ $selectedCustomer }}">{{ $order->customer->name }}</option>
                    </select>
                    <select wire:model="status"
                        class="block w-full p-3 border rounded-lg mt-4 text-sm bg-gray-700 border-gray-600 placeholder-gray-400 text-white"
                        disabled>
                        <option value="">Selecione um status</option>
                        <option value="pending">Em aberto</option>
                        <option value="paid">Pago</option>
                        <option value="declined">Cancelado</option>
                    </select>
                    <h1 class="mt-10 text-white w-auto md:w-[400px] lg:w-[550px] text-sm font-medium">Produtos</h1>
                    @foreach ($orderItems as $index => $orderItem)
                        <div class="flex gap-4 mb-4">
                            <select wire:model="orderItems.{{ $index }}.product_id"
                                class="block w-full p-3 border rounded-lg mt-4 text-sm bg-gray-700 border-gray-600 placeholder-gray-400 text-white"
                                disabled>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                            <input type="number" wire:model="orderItems.{{ $index }}.quantity"
                                class="block w-full p-3 border rounded-lg mt-4 text-sm bg-gray-700 border-gray-600 placeholder-gray-400 text-white"
                                placeholder="Quantidade" disabled>
                        </div>
                    @endforeach
                    <hr class="mt-10 mb-4 ">
                    <div class="mb-4">
                        <label for="discount" class="block text-sm font-medium text-white">Desconto (R$)</label>
                        <input type="number" wire:model.live="discount" id="discount" wire:change="calculateTotal"
                            class="block w-full p-3 border rounded-lg text-sm bg-gray-700 border-gray-600 placeholder-gray-400 text-white"
                            placeholder="Insira o valor de desconto..." disabled>
                    </div>
                    <div class="flex flex-row w-full justify-end text-white font-bold">
                        Total: R$ {{ $total }}
                    </div>
                    <div class="flex flex-col-reverse text-center md:flex-row gap-2 mt-5 md:items-center">
                        <a href="{{ route('orders.index') }}"
                            class="border-2 px-5 rounded-full py-2 mt-4 items-end text-red-500 border-red-500 hover:bg-red-700 hover:bg-opacity-15">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
