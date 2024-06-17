<div class="w-full h-full">
    <div class="flex flex-col justify-center  w-full">
        <x-navbar />
        <div class="container mx-auto">
            <div class="container mx-auto">
                <div class="flex flex-col items-center ">
                    <form wire:submit.prevent='update' class="shadow-sm shadow-white rounded-xl px-10 pb-10 mt-10 mx-2">
                        <h1 class="mt-10 text-white md:w-96 font-medium">Visualizar produto</h1>
                        <div class="w-full mt-5">
                            <div class="flex flex-col">
                                <x-input label="Nome" type="text" name="name" wire:model='name' required
                                    placeholder disabled />
                            </div>
                            <div class="flex flex-col mt-4">
                                <x-input label="Preço" type="number" name="price" wire:model='price' required
                                    placeholder disabled />
                            </div>
                            <div class="flex flex-col mt-4">
                                <x-input label="Descrição" type="text" name="description" wire:model='description'
                                    required placeholder disabled />
                            </div>
                            <div class="flex flex-col-reverse text-center md:flex-row gap-2 mt-4">
                                <a href="{{ route('products.index') }}"
                                    class="border-2 px-5 rounded-full py-2 items-end text-red-500 border-red-500 hover:bg-red-700 hover:bg-opacity-15">Voltar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
