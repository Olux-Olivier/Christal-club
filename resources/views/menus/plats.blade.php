<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plats - Le Christal Club</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>

        body {
            font-family: 'Poppins', sans-serif;
        }
        /* Fade-in général */
        .fade {
            opacity: 0;
            animation: fadeIn 1.2s ease forwards;
        }
        @keyframes fadeIn { to { opacity: 1; } }

        /* Animation cartes */
        .card-anim {
            opacity: 0;
            transform: translateY(20px);
            animation: slideFade .8s ease forwards;
        }
        @keyframes slideFade {
            to { opacity: 1; transform: translateY(0); }
        }

        .overlay-class {
            pointer-events: none;
        }

    </style>
</head>

<body class="bg-gray-200 text-gray-900 relative">

    <!-- IMAGE ARRIÈRE PLAN FIXE -->
    <div class="fixed inset-0 bg-cover bg-center -z-10"
         style="background-image: url('https://images.pexels.com/photos/70497/pexels-photo-70497.jpeg');
                filter: brightness(0.6);">
    </div>

    <!-- OVERLAY POUR MIEUX LIRE -->
    <div class="fixed inset-0 bg-black/30 -z-10"></div>


    <!-- BANNIERE PRINCIPALE -->
    <div class="relative w-full h-64 bg-center fade"
         style="animation-delay:.1s;">

        <!-- Bouton retour -->
       <a href="{{ route('welcome') }}"
            class="absolute top-4 right-4 px-6 py-2
                    bg-white/20 backdrop-blur-xl border border-white/40
                    rounded-full shadow-lg text-white font-semibold
                    hover:bg-white/30 transition z-50 fade"
            style="animation-delay:.4s;">
                Retour à l'accueil
        </a>


        <!-- Titre -->
        <div class="absolute inset-0 flex items-center justify-center fade" style="animation-delay:.2s;">
            <h1 class="text-4xl md:text-5xl font-bold text-white drop-shadow-xl">
                Nos Plats
            </h1>
        </div>
    </div>


    <!-- NAVIGATION CATEGORIES -->
    <div class="flex flex-wrap justify-center gap-4 my-10 fade" style="animation-delay:.6s;">

        <a href="{{ route('menus.plats.plat') }}"
           class="px-6 py-2 rounded-full
                  bg-white/20 backdrop-blur-xl border border-white/30
                  text-white font-semibold shadow-md
                  hover:bg-white/30 transition">
            Plats
        </a>

        <a href="{{ route('menus.boissons.sucree') }}"
           class="px-6 py-2 rounded-full
                  bg-white/10 backdrop-blur-xl border border-white/20
                  text-white font-semibold shadow-md
                  hover:bg-white/20 transition">
            Boissons
        </a>

    </div>


    <!-- CONTENU PRINCIPAL -->
    <div class="max-w-7xl mx-auto px-4 md:px-8 mt-10 mb-16">

        <!-- GRILLE DES PLATS -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach($plats as $index => $item)
            <div class="bg-white/15 backdrop-blur-xl border border-white/20
                        shadow-xl rounded-2xl overflow-hidden
                        transform hover:scale-[1.03] hover:shadow-2xl transition duration-300
                        card-anim"
                 style="animation-delay: {{ 0.2 + ($index * 0.1) }}s;">

                <!-- Image -->
                <div class="h-44 bg-cover bg-center"
                     style="background-image: url('{{ asset('storage/plats/' . $item->image) }}');">
                </div>

                <!-- Contenu -->
                <div class="p-5">
                    <h3 class="text-2xl font-bold text-yellow-300 mb-1 drop-shadow-sm">
                        {{ $item->nom }}
                    </h3>

                    <p class="text-white text-lg font-medium">
                        {{ number_format($item->prix, 0) }} FC
                    </p>
                </div>

            </div>
            @endforeach

        </div>

        <!-- PAGINATION -->
        <div class="mt-10 mb-10 fade text-white" style="animation-delay:1.2s;">
            {{ $plats->links() }}
        </div>

    </div>

    <!-- Footer -->
<footer class="mt-20 bg-white/20 backdrop-blur-2xl border-t border-white/40 shadow-xl">
    <div class="max-w-7xl mx-auto px-6 py-12 text-center">

        <h2 class="text-3xl font-bold text-gray-900 tracking-wide drop-shadow">
            Le Christal Club
        </h2>

        <p class="text-gray-800 mt-2 text-sm font-medium">
            Ambiance • Élégance • Excellence
        </p>

        <!-- Icônes -->
        <div class="flex justify-center gap-7 mt-6">

            <a href="#" class="text-gray-900 hover:text-blue-700 transition">
                <i data-lucide="facebook" class="w-7 h-7"></i>
            </a>

            <a href="#" class="text-gray-900 hover:text-pink-600 transition">
                <i data-lucide="instagram" class="w-7 h-7"></i>
            </a>

            <!-- Icône TikTok personnalisée (SVG) -->
            <a href="#" class="text-gray-900 hover:text-black transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 fill-gray-900 hover:fill-black transition"
                     viewBox="0 0 24 24">
                    <path d="M12.4 2h3.1c.1 1.1.6 2.1 1.3 2.9.8.8 1.8 1.2 3 1.3v3.1c-1.3 0-2.5-.3-3.6-.8v7.3c0 2.1-.7 3.8-2.1 5-1.4 1.2-3.2 1.8-5.4 1.8-1.4 0-2.6-.3-3.7-.8s-2-.9-2.6-1.5l1.6-2.6c.4.4 1 .7 1.8 1 .8.3 1.5.4 2.1.4 1.1 0 2-.3 2.7-.9.7-.6 1.1-1.5 1.1-2.7V6.8c-.9.1-1.8 0-2.7-.4S9 5.6 8.4 4.9L12.4 2z"/>
                </svg>
            </a>

        </div>

       <p class="mt-6 text-black/70 text-xs">
            © {{ date('Y') }} Le Christal Club — Tous droits réservés.
        </p>

    </div>
</footer>

<script>
    lucide.createIcons();
</script>

</body>
</html>
