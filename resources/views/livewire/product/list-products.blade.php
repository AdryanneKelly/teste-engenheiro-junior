<div class="w-full h-full">
    <div class="flex flex-col justify-center  w-full">
        <x-navbar />
        <div class="container mx-auto">
            <div class="flex flex-col items-start w-full">
                <x-alert-success />
                <div class="flex flex-col md:flex-row w-full mx-auto justify-between items-center">
                    <x-create-button route="{{ route('products.create') }}" label="Criar novo produto" />
                    <x-search-input type="text" wire="search" placeholder="Buscar produtos..." />
                </div>
                <div class="w-full mt-10 overflow-auto px-3 md:px-0">
                    <table class="table w-full shadow-lg mb-10">
                        <thead class="bg-slate-600 text-white">
                            <tr class=" ">
                                <th class="text-sm text-left p-4 cursor-pointer" wire:click="sortBy('name')">
                                    <span class="inline-flex gap-1">Nome <x-icons.order-icon /></span>
                                </th>
                                <th class="text-sm text-left p-4 cursor-pointer" wire:click="sortBy('price')">
                                    <span class="inline-flex gap-1">Preço <x-icons.order-icon /></span>
                                </th>
                                <th class="text-sm text-left p-4 cursor-pointer" wire:click="sortBy('description')">
                                    <span class="inline-flex gap-1">Descrição <x-icons.order-icon /></span>
                                </th>
                                <th class="text-sm text-left p-4">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-500 even:bg-slate-700/40 text-gray-200">
                            @if (count($products) > 0)
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="p-4">{{ $product->name }}</td>
                                        <td class="p-4">{{ $product->price }}</td>
                                        <td class="p-4">{{ $product->description }}</td>
                                        <td class="p-4 inline-flex gap-5">
                                            <a href="{{ route('products.view', $product->id) }}"
                                                class="rounded-full border p-2"><x-icons.view-icon /></a>
                                            <a href="{{ route('products.edit', $product->id) }}"
                                                class="rounded-full border p-2"><x-icons.edit-icon /></a>
                                            <button class="rounded-full border p-2 text-red-500 border-red-500"
                                                wire:click='delete({{ $product->id }})'
                                                wire:confirm='Tem certeza que deseja excluir?'><x-icons.delete-icon /></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="p-4" colspan="4">Nenhum produto encontrado</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
