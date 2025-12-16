<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boissons alcoolisées - Le Christal Club</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="text-white">

    <!-- 🔥 Image d’arrière-plan fixe -->
    <div class="fixed inset-0 bg-cover bg-center -z-10"
         style="background-image: url('https://images.pexels.com/photos/1267320/pexels-photo-1267320.jpeg');
                filter: brightness(0.45);">
    </div>

    <!-- Overlay sombre pour lisibilité -->
    <div class="fixed inset-0 bg-black/40 -z-10"></div>

    <!-- SECTION IMAGE (Header) -->
    <div class="relative w-full h-64 bg-center fade">

        <!-- Bouton Retour -->
        <a href="{{ route('welcome') }}"
            class="absolute top-4 right-4 z-50 px-6 py-2
                    bg-white/20 backdrop-blur-xl border border-white/30
                    rounded-full shadow-lg text-white font-semibold
                    hover:bg-white/30 transition">
            Retour à l'accueil
        </a>

        <!-- Titre -->
        <div class="absolute inset-0 flex flex-col items-center justify-center gap-4 bg-black/30">
            <h1 class="text-4xl md:text-5xl font-bold drop-shadow-xl">
                Boissons alcoolisées
            </h1>

            <a href="{{ route('menus.plats.plat') }}"
               class="px-5 py-2 rounded-full
                      bg-white/20 backdrop-blur-xl border border-white/30
                      text-white font-semibold shadow hover:bg-white/30 transition">
                🍽️ Voir les plats
            </a>
        </div>
    </div>


    <!-- NAVIGATION DES CATÉGORIES -->
    <div class="flex flex-wrap justify-center gap-4 my-10">

        <a href="{{ route('menus.boissons.sucree') }}"
   class="px-6 py-2 rounded-full font-semibold shadow transition
   {{ request()->routeIs('menus.boissons.sucree')
        ? 'bg-white/30 backdrop-blur-xl border border-white/40 text-white'
        : 'bg-white/10 backdrop-blur-xl border border-white/20 text-white hover:bg-white/20' }}">
    Sucrées
</a>

<a href="{{ route('menus.boissons.alcool') }}"
   class="px-6 py-2 rounded-full font-semibold shadow transition
   {{ request()->routeIs('menus.boissons.alcool')
        ? 'bg-white/30 backdrop-blur-xl border border-white/40 text-white'
        : 'bg-white/10 backdrop-blur-xl border border-white/20 text-white hover:bg-white/20' }}">
    Alcool
</a>

    </div>


    <!-- CONTENEUR GLOBAL -->
    <div class="max-w-7xl mx-auto px-4 md:px-8 mt-10 mb-16">

        <!-- Grille des boissons -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach($boissons as $item)
            <div class="bg-white/15 backdrop-blur-xl border border-white/20
                        shadow-xl rounded-2xl overflow-hidden
                        transform hover:scale-[1.03] hover:shadow-2xl transition duration-300">

                <!-- Image -->
                @if($item->image)
                <div class="h-40 bg-cover bg-center"
                     style="background-image: url('{{ asset('storage/boissons/' . $item->image) }}');">
                </div>
                @else
                <div class="h-40 bg-black/20 border-b border-white/20 flex items-center justify-center text-white/60">
                    Pas d'image
                </div>
                @endif

                <!-- Texte -->
                <div class="p-5">
                    <h3 class="text-xl font-bold text-yellow-300 mb-2 drop-shadow-sm">
                        {{ $item->nom }}
                    </h3>
                    <p class="text-white font-medium">
                        {{ number_format($item->prix, 0) }} $
                    </p>
                </div>

            </div>
            @endforeach

        </div>

        <!-- Pagination -->
        <div class="mt-10 text-white">
            {{ $boissons->links() }}
        </div>

    </div>

    <!-- Footer -->
<footer class="mt-20 bg-white/30 backdrop-blur-xl border-t border-white/40 shadow-xl">
    <div class="max-w-7xl mx-auto px-6 py-10 text-center">

        <h2 class="text-2xl font-bold text-gray-900 drop-shadow">
            Le Christal Club
        </h2>

        <p class="text-gray-800 mt-2 text-sm font-medium">
            Ambiance • Élégance • Excellence
        </p>

        <div class="flex justify-center gap-6 mt-4">
            <a href="#" class="text-gray-700 hover:text-black transition font-semibold">
                Facebook
            </a>
            <a href="#" class="text-gray-700 hover:text-black transition font-semibold">
                Instagram
            </a>
            <a href="#" class="text-gray-700 hover:text-black transition font-semibold">
                WhatsApp
            </a>
        </div>

        <p class="mt-6 text-gray-700 text-xs">
            © {{ date('Y') }} Le Christal Club — Tous droits réservés.
        </p>

    </div>
</footer>



</body>
</html>
