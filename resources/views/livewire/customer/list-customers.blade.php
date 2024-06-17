<div class="w-full h-full">
    <div class="flex flex-col justify-center  w-full">
        <x-navbar />
        <div class="container mx-auto">
            <div class="flex flex-col items-start">
                <x-alert-success />
                <div class="flex flex-col-reverse md:flex-row w-full mx-auto justify-between items-center">
                    <x-create-button route="{{ route('customers.create') }}" label='Criar novo cliente' />
                    <x-search-input type="text" wire="search" placeholder="Buscar clientes..." />
                </div>
                <div class="w-full mt-10 overflow-auto px-3 md:px-0">
                    <table class="table w-full shadow-lg mb-10">
                        <thead class="bg-slate-600 text-white">
                            <tr>
                                <th class="text-sm text-left p-4 cursor-pointer" wire:click="sortBy('name')">
                                    <span class="inline-flex gap-1">Nome <x-icons.order-icon /></span>
                                </th>
                                <th class="text-sm text-left p-4 cursor-pointer" wire:click="sortBy('email')">
                                    <span class="inline-flex gap-1">Email <x-icons.order-icon /></span>
                                </th>
                                <th class="text-sm text-left p-4">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-500 even:bg-slate-700/40 text-gray-200">
                            @if (count($customers) > 0)
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td class="p-4">{{ $customer->name }}</td>
                                        <td class="p-4">{{ $customer->email }}</td>
                                        <td class="p-4 inline-flex gap-5">
                                            <a href="{{ route('customers.view', $customer->id) }}"
                                                class="rounded-full border p-2"><x-icons.view-icon /></a>
                                            <a href="{{ route('customers.edit', $customer->id) }}"
                                                class="rounded-full border p-2"><x-icons.edit-icon /></a>
                                            <button class="rounded-full border p-2 text-red-500 border-red-500"
                                                wire:click='delete({{ $customer->id }})'
                                                wire:confirm='Tem certeza que deseja excluir?'><x-icons.delete-icon /></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="p-4" colspan="4">Nenhum cliente encontrado</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
