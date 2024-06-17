<div class="bg-slate-900 w-full py-5">
    <div class="container mx-auto">
        <div class="flex flex-col gap-4 md:flex-row items-center justify-between px-2 md:px-0">
            <h1 class="text-3xl font-bold text-transparent bg-gradient-to-r from-purple-500 to-orange-400 bg-clip-text">
                Praqt</h1>
            <div class="flex flex-col-reverse items-center md:flex-row gap-5 text-sm font-semibold">
                <div class="flex flex-row gap-5">
                    <a href="{{ route('products.index') }}" class="text-white hover:text-purple-400">Produtos</a>
                    <a href="{{ route('customers.index') }}" class="text-white hover:text-purple-400">Clientes</a>
                    <a href="{{ route('orders.index') }}" class="text-white hover:text-purple-400 pr-4">Pedidos</a>
                </div>
                <div class="flex flex-row gap-5">
                    <p class="text-white font-normal">Olá, {{ auth()->user()->name }}</p>
                    <a class="text-white hover:text-orange-400" href="{{ route('logout') }}"><x-icons.logout-icon /></a>
                </div>
            </div>
        </div>
    </div>
</div>
