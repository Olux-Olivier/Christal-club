<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chrystal-Club | Plats</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Icônes -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Police -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- STYLE GLASS (IDENTIQUE AUX BOISSONS) -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .glass {
            background: linear-gradient(
                135deg,
                rgba(255,255,255,0.12),
                rgba(255,255,255,0.02)
            );
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255,255,255,0.18);
        }
    </style>
</head>

<body class="font-poppins bg-gradient-to-br from-black via-gray-900 to-black text-white min-h-screen">

<!-- HEADER -->
<header class="border-b border-gray-800">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <h1 class="text-xl font-bold tracking-wider">
            Le Crystal<span class="text-blue-500">-Snack Bar</span>
        </h1>

        <a href="{{ route('welcome') }}"
           class="px-4 py-2 rounded-lg bg-gray-800 border border-gray-700
                  hover:bg-gray-700 transition text-sm font-semibold">
            Retour
        </a>
    </div>
</header>

<!-- TOOLBAR (IDENTIQUE AUX BOISSONS) -->
<section class="max-w-7xl mx-auto px-6 py-10">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">

        <div class="flex items-center gap-4">
            <span class="material-icons text-4xl text-blue-400">
                restaurant
            </span>

            <div>
                <h2 class="text-3xl font-extrabold tracking-wide">
                    Nos Plats
                </h2>
                <p class="text-gray-400 text-sm mt-1">
                    Cuisine du Chrystal-Club
                </p>
            </div>
        </div>

        <div class="flex flex-wrap gap-3">
            <a href="{{ route('menus.boissonsResto.sucree') }}"
               class="px-5 py-2 rounded-xl font-semibold border
               {{ request()->routeIs('menus.boissonsResto.sucree')
                    ? 'bg-blue-600 border-blue-500'
                    : 'bg-gray-800 border-gray-700 hover:bg-gray-700' }}">
                B. Sucrées
            </a>

            <a href="{{ route('menus.boissonsResto.alcool') }}"
               class="px-5 py-2 rounded-xl font-semibold border
               {{ request()->routeIs('menus.boissonsResto.alcool')
                    ? 'bg-blue-600 border-blue-500'
                    : 'bg-gray-800 border-gray-700 hover:bg-gray-700' }}">
                B. Alcoolisées
            </a>
            <a href="{{ route('menus.plats.plat') }}"
               class="px-5 py-2 rounded-xl font-semibold border
               {{ request()->routeIs('menus.plats.plat')
                    ? 'bg-blue-600 border-blue-500'
                    : 'bg-gray-800 border-gray-700 hover:bg-gray-700' }}">
                Plats
            </a>
            {{-- <a href="{{ route('menus.boissons.sucree') }}"
               class="px-5 py-2 rounded-xl font-semibold border
                      bg-gray-800 border-gray-700 hover:bg-gray-700 transition">
                Menu club
            </a> --}}
        </div>

    </div>
</section>

<!-- CONTENU MESSAGE -->
{{-- <main class="max-w-4xl mx-auto px-6 mb-24">

    <div class="glass rounded-3xl shadow-2xl p-10 md:p-14 text-center">

        <!-- Icône -->
        <div class="flex justify-center mb-6">
            <i data-lucide="info" class="w-14 h-14 text-blue-400"></i>
        </div>

        <!-- Message -->
        <h3 class="text-2xl md:text-3xl font-bold mb-6">
            Les plats ne sont pas encore disponibles
        </h3>

        <p class="text-gray-300 text-lg leading-relaxed mb-10">
            Notre équipe travaille actuellement à la préparation d’un menu
            culinaire à la hauteur de l’expérience <strong>Chrystal-Club</strong>.
            <br><br>
            En attendant, nous vous invitons à profiter pleinement de notre
            sélection raffinée de boissons.
        </p>

        <!-- CTA -->
        <a href="{{ route('menus.boissons.sucree') }}"
           class="inline-flex items-center gap-3 px-8 py-3 rounded-full
                  bg-gradient-to-r from-blue-600 to-indigo-600
                  hover:from-indigo-600 hover:to-blue-600
                  transition font-semibold shadow-lg">
            <i data-lucide="wine" class="w-5 h-5"></i>
            Découvrir les boissons
        </a>

    </div>

</main> --}}

<div class="max-w-7xl mx-auto py-10 px-4">


    @if($plats->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

            @foreach($plats as $plat)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-105 transition">

                    <!-- Image -->
                    <img
                        src="{{ asset('storage/plats/' . $plat->image) }}"
                        alt="{{ $plat->nom }}"
                        class="w-full h-48 object-cover"
                    >

                    <!-- Contenu -->
                    <div class="p-4">
                        <h2 class="text-xl font-semibold">{{ $plat->nom }}</h2>
                        <p class="text-yellow-600 font-bold mt-2">
                            {{ number_format($plat->prix, 0) }} FC
                        </p>
                    </div>

                </div>
            @endforeach

        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $plats->links() }}
        </div>
    @else
        <p class="text-center text-gray-500">Aucun plat disponible pour le moment.</p>
    @endif

</div>

<!-- FOOTER -->
<footer class="border-t border-gray-800 py-12 text-center">

    <h3 class="text-2xl font-bold tracking-wide">
        Chrystal<span class="text-blue-500">-Club</span>
    </h3>

    <p class="text-gray-400 text-sm mt-2">
        Ambiance • Élégance • Excellence
    </p>

    <p class="mt-6 text-gray-500 text-xs">
        © {{ date('Y') }} Chrystal-Club — Tous droits réservés
    </p>
</footer>

<script>
    lucide.createIcons();
</script>

</body>
</html>
