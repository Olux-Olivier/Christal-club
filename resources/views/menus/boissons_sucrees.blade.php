<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boissons Sucrées - Le Christal Club</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(25px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .fade-in-up {
            opacity: 0;
            animation: fadeInUp .9s ease-out forwards;
        }
    </style>
</head>

<body class="text-white">

    <!-- 🌄 BACKGROUND -->
    <div class="fixed inset-0 bg-cover bg-center -z-10"
         style="background-image:url('https://images.pexels.com/photos/1589919/pexels-photo-1589919.jpeg');
                filter: brightness(0.45);">
    </div>
    <div class="fixed inset-0 bg-black/40 -z-10"></div>

    <!-- HEADER -->
    <header class="relative h-64 flex items-center justify-center fade-in-up">

        <!-- Bouton retour -->
        <a href="{{ route('welcome') }}"
            class="absolute top-4 right-4 z-50 px-6 py-2
                    bg-white/20 backdrop-blur-xl border border-white/30
                    rounded-full shadow-lg text-white font-semibold
                    hover:bg-white/30 transition">
            Retour à l'accueil
        </a>


        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold drop-shadow-lg">
                Boissons Sucrées
            </h1>

            <a href="{{ route('menus.plats.plat') }}"
               class="inline-block mt-4 px-5 py-2
                      bg-white/20 backdrop-blur-xl border border-white/30
                      rounded-full font-semibold shadow
                      hover:bg-white/30 transition">
                🍽️ Voir les plats
            </a>
        </div>
    </header>

    <!-- NAVIGATION -->
    <nav class="flex justify-center gap-4 my-10 fade-in-up" style="animation-delay:.2s">

        <a href="{{ route('menus.boissons.sucree') }}"
            class="px-6 py-2 rounded-full font-semibold shadow transition
            {{ request()->routeIs('menus.boissons.sucree')
                    ? 'bg-white/30 backdrop-blur-xl border border-white/40 text-white'
                    : 'bg-white/10 backdrop-blur-xl border border-white/20 text-white hover:bg-white/20' }}">
            Sucrées
        </a>

        <a href="{{ route('menus.boissons.alcool') }}"
            class="px-6 py-2 rounded-full font-semibold shadow transition
            {{ request()->routeIs('LE_NOM_EXACT_DE_LA_ROUTE')
                    ? 'bg-white/30 backdrop-blur-xl border border-white/40 text-white'
                    : 'bg-white/10 backdrop-blur-xl border border-white/20 text-white hover:bg-white/20' }}">
                Alcool
        </a>
    </nav>

    <!-- CONTENU -->
    <main class="max-w-7xl mx-auto px-4 md:px-8 mb-20">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse($boissons as $index => $item)
            <div class="bg-white/15 backdrop-blur-xl border border-white/20
                        rounded-2xl overflow-hidden shadow-xl
                        hover:scale-[1.03] hover:shadow-2xl transition
                        fade-in-up"
                 style="animation-delay: {{ 0.1 + $index * 0.1 }}s">

                <!-- Image -->
                @if($item->image)
                <div class="h-40 bg-cover bg-center"
                     style="background-image:url('{{ asset('storage/boissons/'.$item->image) }}')">
                </div>
                @else
                <div class="h-40 bg-black/20 flex items-center justify-center text-white/60">
                    Pas d'image
                </div>
                @endif

                <!-- Texte -->
                <div class="p-5">
                    <h3 class="text-xl font-bold text-yellow-300 mb-1">
                        {{ $item->nom }}
                    </h3>
                    <p class="font-medium">
                        {{ number_format($item->prix,0) }} $
                    </p>
                </div>

            </div>
            @empty
                <p class="col-span-3 text-center text-white/70">
                    Aucune boisson sucrée disponible
                </p>
            @endforelse

        </div>

        <!-- PAGINATION -->
        <div class="mt-12 fade-in-up" style="animation-delay:.6s">
            {{ $boissons->links() }}
        </div>

    </main>

    <!-- FOOTER -->
    <footer class="bg-white/10 backdrop-blur-2xl border-t border-white/30 py-12 text-center fade-in-up">

        <h2 class="text-3xl font-bold drop-shadow">
            Le Christal Club
        </h2>

        <p class="text-white/80 mt-2 text-sm">
            Ambiance • Élégance • Excellence
        </p>

        <div class="flex justify-center gap-7 mt-6">

            <a href="#" class="hover:text-blue-400 transition">
                <i data-lucide="facebook" class="w-7 h-7"></i>
            </a>

            <a href="#" class="hover:text-pink-400 transition">
                <i data-lucide="instagram" class="w-7 h-7"></i>
            </a>

            <a href="#" class="hover:opacity-80 transition">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-7 h-7 fill-white"
                     viewBox="0 0 24 24">
                    <path d="M12.4 2h3.1c.1 1.1.6 2.1 1.3 2.9.8.8 1.8 1.2 3 1.3v3.1c-1.3 0-2.5-.3-3.6-.8v7.3c0 2.1-.7 3.8-2.1 5-1.4 1.2-3.2 1.8-5.4 1.8-1.4 0-2.6-.3-3.7-.8s-2-.9-2.6-1.5l1.6-2.6c.4.4 1 .7 1.8 1 .8.3 1.5.4 2.1.4 1.1 0 2-.3 2.7-.9.7-.6 1.1-1.5 1.1-2.7V6.8c-.9.1-1.8 0-2.7-.4S9 5.6 8.4 4.9L12.4 2z"/>
                </svg>
            </a>

        </div>

        <p class="mt-6 text-white/70 text-xs">
            © {{ date('Y') }} Le Christal Club — Tous droits réservés.
        </p>

    </footer>

    <script>
        lucide.createIcons();
    </script>

</body>
</html>
