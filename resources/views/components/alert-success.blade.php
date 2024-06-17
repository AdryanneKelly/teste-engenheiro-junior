@if (session()->has('message'))
    <div class="text-green-500 bg-green-600/15 px-5 w-full py-2 mt-4">
        {{ session('message') }}
    </div>
@endif
