<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boissons alcoolisées - Le Christal Club</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Fade-in + slide animation */
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(25px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            opacity: 0;
            animation: fadeInUp 0.9s ease-out forwards;
        }

        .fade-delay-1 { animation-delay: 0.1s; }
        .fade-delay-2 { animation-delay: 0.2s; }
        .fade-delay-3 { animation-delay: 0.3s; }
        .fade-delay-4 { animation-delay: 0.4s; }
        .fade-delay-5 { animation-delay: 0.5s; }
        .fade-delay-6 { animation-delay: 0.6s; }
    </style>
</head>
<body class="text-white">

    <!-- 🔥 Arrière-plan fixe -->
    <div class="fixed inset-0 bg-cover bg-center -z-10"
         style="background-image: url('https://images.pexels.com/photos/1589919/pexels-photo-1589919.jpeg'); filter: brightness(0.45);">
    </div>

    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/40 -z-10"></div>

    <!-- HEADER -->
    <div class="relative w-full h-64">

        <!-- Bouton retour -->
        <a href="{{ route('welcome') }}"
           class="absolute top-4 right-4 px-6 py-2
                  bg-white/20 backdrop-blur-xl border border-white/30
                  rounded-full shadow-lg text-white font-semibold
                  hover:bg-white/30 transition fade-in-up fade-delay-4">
            Retour à l'accueil
        </a>

        <!-- Titre -->
        <div class="absolute inset-0 flex flex-col items-center justify-center gap-4 bg-black/30 fade-in-up fade-delay-2">
            <h1 class="text-4xl md:text-5xl font-bold drop-shadow-lg">
                Boissons alcoolisées
            </h1>

            <a href="{{ route('menus.plats.plat') }}"
               class="px-5 py-2 rounded-full
                      bg-white/20 backdrop-blur-xl border border-white/30
                      text-white font-semibold shadow hover:bg-white/30 transition fade-in-up fade-delay-3">
                🍽️ Voir les plats
            </a>
        </div>
    </div>

    <!-- NAVIGATION -->
    <div class="flex flex-wrap justify-center gap-4 my-10 fade-in-up fade-delay-5">

        <a href="{{ route('menus.boissons.sucree') }}"
           class="px-6 py-2 rounded-full
                  bg-white/20 backdrop-blur-xl border border-white/30
                  text-white font-semibold shadow hover:bg-white/30 transition">
            Sucrées
        </a>

        <a href="{{ route('menus.boissons.alcool') }}"
           class="px-6 py-2 rounded-full
                  bg-white/10 backdrop-blur-xl border border-white/20
                  text-white font-semibold shadow hover:bg-white/20 transition">
            Alcool
        </a>

    </div>

    <!-- CONTENU PRINCIPAL -->
    <div class="max-w-7xl mx-auto px-4 md:px-8 mt-10 mb-16">

        <!-- ❄️ CARTES DES BOISSONS -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($boissons as $index => $item)
            <div class="bg-white/15 backdrop-blur-xl border border-white/20
                        shadow-xl rounded-2xl overflow-hidden
                        transform hover:scale-[1.03] hover:shadow-2xl transition duration-300
                        fade-in-up"
                 style="animation-delay: {{ 0.2 + ($index * 0.1) }}s;">

                <!-- IMAGE -->
                @if($item->image)
                <div class="h-40 bg-cover bg-center"
                     style="background-image: url('{{ asset('storage/boissons/' . $item->image) }}');">
                </div>
                @else
                <div class="h-40 bg-black/20 border-b border-white/20 flex items-center justify-center text-white/60">
                    Pas d'image
                </div>
                @endif

                <!-- TEXTE -->
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

        <!-- PAGINATION -->
        <div class="mt-10 text-white fade-in-up fade-delay-6">
            {{ $boissons->links() }}
        </div>

    </div>

    <!-- FOOTER GLACE PREMIUM -->
    <footer class="mt-20 bg-white/10 backdrop-blur-2xl border-t border-white/30 shadow-xl fade-in-up fade-delay-6">
        <div class="max-w-7xl mx-auto px-6 py-12 text-center">

            <h2 class="text-3xl font-bold text-white tracking-wide drop-shadow">
                Le Christal Club
            </h2>

            <p class="text-white/80 mt-2 text-sm font-medium">
                Ambiance • Élégance • Excellence
            </p>

            <!-- Icônes -->
            <div class="flex justify-center gap-7 mt-6">

                <a href="#" class="text-white hover:text-blue-300 transition">
                    <i data-lucide="facebook" class="w-7 h-7"></i>
                </a>

                <a href="#" class="text-white hover:text-pink-400 transition">
                    <i data-lucide="instagram" class="w-7 h-7"></i>
                </a>

                <!-- TikTok -->
                <a href="#" class="hover:opacity-80 transition">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-7 h-7 fill-white transition"
                         viewBox="0 0 24 24">
                        <path d="M12.4 2h3.1c.1 1.1.6 2.1 1.3 2.9.8.8 1.8 1.2 3 1.3v3.1c-1.3 0-2.5-.3-3.6-.8v7.3c0 2.1-.7 3.8-2.1 5-1.4 1.2-3.2 1.8-5.4 1.8-1.4 0-2.6-.3-3.7-.8s-2-.9-2.6-1.5l1.6-2.6c.4.4 1 .7 1.8 1 .8.3 1.5.4 2.1.4 1.1 0 2-.3 2.7-.9.7-.6 1.1-1.5 1.1-2.7V6.8c-.9.1-1.8 0-2.7-.4S9 5.6 8.4 4.9L12.4 2z"/>
                    </svg>
                </a>

            </div>

            <p class="mt-6 text-white/80 text-xs">
                © {{ date('Y') }} Le Christal Club — Tous droits réservés.
            </p>

        </div>
    </footer>

    <script>
        lucide.createIcons();
    </script>

</body>
</html>
