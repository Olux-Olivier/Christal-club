<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boissons sucrées - Le Christal Club</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Section image de fond -->
    <div class="relative w-full h-64 bg-cover bg-center"
         style="background-image: url('https://images.pexels.com/photos/1589919/pexels-photo-1589919.jpeg');">

        <!-- Bouton Retour -->
        <a href="{{ route('welcome') }}"
           class="absolute top-4 right-4 px-5 py-2 bg-white/80 backdrop-blur rounded-full shadow font-semibold text-gray-800 hover:bg-white transition z-50">
            Retour à l'accueil
        </a>

        <!-- Titre centré -->
        <div class="absolute inset-0 flex items-center justify-center bg-black/40">
            <h1 class="text-4xl md:text-5xl font-bold text-white">Boissons sucrées</h1>
        </div>
    </div>

    <!-- Navigation des catégories -->
    <div class="flex flex-wrap justify-center gap-4 my-10">
        <a href="{{ route('menus.boissons.sucree') }}"
        class="px-6 py-2 rounded-full bg-blue-700 text-white font-semibold hover:bg-blue-900 transition">
            Sucrées
        </a>

        <a href="{{ route('menus.boissons.alcool') }}"
        class="px-6 py-2 rounded-full bg-black text-white font-semibold hover:bg-gray-800 transition">
            Alcool
        </a>
    </div>

    <!-- Conteneur global -->
<div class="max-w-7xl mx-auto px-4 md:px-8 mt-10 mb-16">

    <!-- Grille des boissons -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($boissons as $item)
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden transform hover:scale-[1.03] transition duration-300">

            <!-- Image -->
            @if($item->image)
            <div class="h-40 bg-cover bg-center" style="background-image: url('{{ asset('storage/boissons/' . $item->image) }}');"></div>
            @else
            <div class="h-40 bg-gray-200 flex items-center justify-center text-gray-400">
                Pas d'image
            </div>
            @endif

            <!-- Contenu -->
            <div class="p-5">
                <h3 class="text-xl font-semibold text-blue-700 mb-2">{{ $item->nom }}</h3>
                <p class="text-gray-700 font-medium">{{ number_format($item->prix, 0) }} $</p>
            </div>

        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-10">
        {{ $boissons->links() }}
    </div>

</div>


</body>
</html>

