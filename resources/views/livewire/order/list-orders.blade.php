<div class="w-full h-full">
    <div class="flex flex-col justify-center  w-full">
        <x-navbar />
        <div class="container mx-auto">
            <div class="flex flex-col items-start">
                <x-alert-success />
                <div class="flex flex-col-reverse md:flex-row w-full mx-auto justify-between items-center">
                    <x-create-button route="{{ route('orders.create') }}" label="Criar novo pedido" />
                    <div class="flex flex-col md:flex-row gap-2">

                        <select wire:model.live="status"
                            class="block w-72 p-3 border rounded-lg mt-10 text-sm bg-gray-700 border-gray-600 placeholder-gray-400 text-white">
                            <option value="">Selecione um Status</option>
                            <option value="pending">Em aberto</option>
                            <option value="paid">Pago</option>
                            <option value="declined">Cancelado</option>
                        </select>
                        <x-search-input type="text" wire="search" placeholder="Buscar produtos..." />
                    </div>

                </div>
                <div class="w-full mt-10 px-3 md:px-0 overflow-auto">
                    <table class="table w-full  shadow-lg mb-10">
                        <thead class="bg-slate-600 text-white">
                            <tr>
                                <th class="text-sm text-left p-4 cursor-pointer" wire:click="sortBy('orders.id')">
                                    <span class="inline-flex gap-1">ID <x-icons.order-icon /></span>
                                </th>
                                <th class="text-sm text-left p-4 cursor-pointer" wire:click="sortBy('customers.name')">
                                    <span class="inline-flex gap-1">Cliente <x-icons.order-icon /></span>
                                </th>
                                <th class="text-sm text-left p-4 cursor-pointer" wire:click="sortBy('orders.status')">
                                    <span class="inline-flex gap-1">Status <x-icons.order-icon /></span>
                                </th>
                                <th class="text-sm text-left p-4 cursor-pointer" wire:click="sortBy('orders.total')">
                                    <span class="inline-flex gap-1">Valor Total <x-icons.order-icon /></span>
                                </th>
                                <th class="text-sm text-left p-4">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-500 even:bg-slate-700/40 text-gray-200">
                            @if (count($orders) > 0)
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="p-4">{{ $order->id }}</td>
                                        <td class="p-4">{{ $order->customer->name }}</td>
                                        <td class="p-4">{{ $this->status($order->status) }}</td>
                                        <td class="p-4">{{ $order->total }}</td>
                                        <td class="p-4 inline-flex gap-5">
                                            <a href="{{ route('orders.view', $order->id) }}"
                                                class="rounded-full border p-2"><x-icons.view-icon /></a>
                                            <a href="{{ route('orders.edit', $order->id) }}"
                                                class="rounded-full border p-2"><x-icons.edit-icon /></a>
                                            <button wire:click="delete({{ $order->id }})"
                                                class="rounded-full border p-2 text-red-500 border-red-500"
                                                wire:confirm='Tem certeza que deseja excluir?'><x-icons.delete-icon /></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="p-4" colspan="5">Nenhum pedido encontrado</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
