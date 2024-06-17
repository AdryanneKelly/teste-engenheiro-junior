<div class="h-screen">
    <div class="flex flex-col justify-center h-full w-full">
        <div class="container mx-auto">
            <div class="flex flex-col items-center">
                <form wire:submit.prevent='login'
                    class="shadow-md shadow-purple-400 border-t-purple-400 border-t rounded-xl px-10 pb-10 mt-10 mx-2">
                    <div class=" flex flex-row w-full justify-center pt-10">
                        <h1
                            class="text-3xl font-bold text-transparent bg-gradient-to-r from-purple-500 to-orange-600 w-fit bg-clip-text">
                            Praqt</h1>
                    </div>
                    <h1 class="mt-10 text-white w-auto md:w-[450px] lg:w-[500px] font-medium">Login</h1>

                    <input wire:model="email" type="email"
                        class="block w-full p-3 border rounded-lg mt-6 text-sm bg-gray-700 border-gray-600 placeholder-gray-400 text-white"
                        placeholder="Email" required>
                    <input wire:model="password" type="password"
                        class="block w-full p-3 border rounded-lg mt-6 text-sm bg-gray-700 border-gray-600 placeholder-gray-400 text-white"
                        placeholder="Senha" required>
                    <x-alert-error />
                    <div class="flex flex-row w-full justify-center">
                        <button type="submit"
                            class="border-2 px-5 rounded-full py-2 items-end text-white text-sm hover:bg-slate-600 mt-6">Login</button>
                    </div>
                    <div class="flex flex-row w-full justify-center items-center mt-10 text-sm text-white">
                        Não tem uma conta?
                        <a href="{{ route('register') }}" class="text-orange-500 hover:text-orange-400 pl-1">
                            Registre-se</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
