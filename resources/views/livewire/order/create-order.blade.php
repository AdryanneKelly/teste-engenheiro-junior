<div class="w-full h-full">
    <div class="flex flex-col justify-center  w-full">
        <x-navbar />
        <div class="container mx-auto">
            <div class="flex flex-col items-center">
                <form wire:submit.prevent='create' class="shadow-sm shadow-white rounded-xl px-10 pb-10 mt-10 mx-2">
                    <h1 class="mt-10 text-white w-auto md:w-[400px] lg:w-[550px] font-medium">Cadastrar novo pedido</h1>
                    <x-alert-error />
                    <select wire:model="selectedCustomer"
                        class="block w-full p-3 border rounded-lg mt-10 text-sm bg-gray-700 border-gray-600 placeholder-gray-400 text-white"
                        required>
                        <option value="">Selecione um cliente</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                    <h1 class="mt-10 text-white w-auto md:w-[400px] lg:w-[550px] text-sm font-medium">Produtos</h1>

                    @foreach ($orderItems as $index => $orderItem)
                        <div class="flex gap-4 mt-4">
                            <select wire:model="orderItems.{{ $index }}.product_id" wire:change="calculateTotal"
                                class="block w-full p-3 border rounded-lg  text-sm bg-gray-700 border-gray-600 placeholder-gray-400 text-white"
                                required>
                                <option value="">Selecione um produto</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                            <input type="number" wire:model="orderItems.{{ $index }}.quantity"
                                wire:change="calculateTotal"
                                class="block w-full p-3 border rounded-lg  text-sm bg-gray-700 border-gray-600 placeholder-gray-400 text-white"
                                placeholder="Quantidade" required>
                            <button type="button" wire:click="removeProduct({{ $index }})"
                                class="border-2 px-5 rounded-full py-2 items-end text-red-500 border-red-500 hover:bg-red-700 hover:bg-opacity-15">Remover</button>
                        </div>
                    @endforeach
                    <div class="flex flex-row w-full justify-center">
                        <button type="button" wire:click="addProduct"
                            class="border-2 px-5 text-sm rounded-full py-2 items-end border-purple-500 text-purple-500 hover:bg-slate-600 mt-4">Adicionar
                            Produto</button>
                    </div>
                    <hr class="mt-10 mb-4 ">
                    <div class="mb-4">
                        <label for="discount" class="block text-sm font-medium text-white">Desconto (R$)</label>
                        <input type="number" step="any" wire:model.lazy="discount" id="discount"
                            wire:change="calculateTotal"
                            class="block w-full p-3 border rounded-lg text-sm bg-gray-700 border-gray-600 placeholder-gray-400 text-white"
                            placeholder="Insira o valor de desconto...">
                    </div>
                    <div class="flex flex-row w-full justify-end text-white font-bold">
                        Total: R$ {{ $total }}
                    </div>
                    <div class="flex flex-col-reverse text-center md:flex-row gap-2 mt-5 md:items-center">
                        <a href="{{ route('orders.index') }}"
                            class="border-2 px-5 rounded-full py-2 items-end text-red-500 border-red-500 hover:bg-red-700 hover:bg-opacity-15">Voltar</a>
                        <button type="submit"
                            class="border-2 px-5 rounded-full py-2 items-end text-white hover:bg-slate-600">Criar
                            Pedido</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
