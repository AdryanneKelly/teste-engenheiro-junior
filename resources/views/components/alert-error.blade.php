@if ($errors->any())
    <div class="text-red-500 text-sm p-2 rounded-lg mt-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
