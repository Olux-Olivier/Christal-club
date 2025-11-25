<h1 class="text-3xl font-bold mb-6">🥤 Boissons sucrées</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

@foreach($boissons as $item)

    <div class="p-4 shadow bg-white rounded-xl">
        <h3 class="text-xl font-semibold">{{ $item->nom }}</h3>
        <p class="text-gray-600">{{ $item->prix }} $</p>
    </div>

@endforeach

</div>

