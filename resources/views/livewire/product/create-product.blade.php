<div class="w-full h-full">
    <div class="flex flex-col justify-center  w-full">
        <x-navbar />
        <div class="container mx-auto">
            <div class="flex flex-col items-center ">
                <form wire:submit.prevent='create' class="shadow-sm shadow-white rounded-xl px-10 pb-10 mt-10">
                    <h1 class="mt-10 text-white md:w-96 font-medium">Criar novo produto</h1>
                    <div class="w-full mt-10">
                        <div class="flex flex-col">
                            <x-input label="Nome" type="text" name="name" wire:model='name' required
                                placeholder='Fulano' />
                        </div>
                        <div class="flex flex-col ">
                            <label for="price" class="block mb-2 text-sm font-medium text-white"> Preço</label>
                            <input label="Preço" type="number" name="price" wire:model='price' step="any"
                                placeholder="0.00"
                                class="block w-full p-2 border rounded-lg text-sm bg-gray-700 border-gray-600 placeholder-gray-400 text-white"
                                required />
                        </div>
                        <div class="flex flex-col mt-6">
                            <x-input label="Descrição" type="text" name="description" wire:model='description'
                                required placeholder="Descrição do produto" />
                        </div>
                        <div class="flex flex-col-reverse text-center md:flex-row gap-2 mt-4">
                            <a href="{{ route('products.index') }}"
                                class="border-2 px-5 rounded-full py-2 items-end text-red-500 border-red-500 hover:bg-red-700 hover:bg-opacity-15">Voltar</a>
                            <button class="border-2 px-5 rounded-full py-2 items-end text-white hover:bg-slate-600"
                                type="submit">
                                Criar novo produto
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
