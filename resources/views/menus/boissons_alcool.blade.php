<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Crystal-Club | Boissons alcoolisées</title>

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

    <!-- STYLE CRYSTAL -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .glass-crystal {
            position: relative;
            background: linear-gradient(
                135deg,
                rgba(255,255,255,0.12),
                rgba(255,255,255,0.02)
            );
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255,255,255,0.18);
            overflow: hidden;
        }

        .glass-crystal::before {
            content: "";
            position: absolute;
            top: -60%;
            left: -80%;
            width: 60%;
            height: 220%;
            background: linear-gradient(
                120deg,
                transparent 35%,
                rgba(255,255,255,0.35),
                transparent 65%
            );
            transform: rotate(25deg);
            animation: crystalSweep 7s linear infinite;
            opacity: 0.6;
            pointer-events: none;
        }

        @keyframes crystalSweep {
            0% { left: -80%; opacity: 0; }
            15% { opacity: 0.4; }
            50% { opacity: 0.7; }
            85% { opacity: 0.4; }
            100% { left: 130%; opacity: 0; }
        }

        .glass-delay-1::before { animation-delay: 0s; }
        .glass-delay-2::before { animation-delay: 1.8s; }
        .glass-delay-3::before { animation-delay: 3.6s; }
        .glass-delay-4::before { animation-delay: 5.4s; }
    </style>
</head>

<body class="bg-gradient-to-br from-black via-gray-900 to-black text-white min-h-screen">

<!-- HEADER -->
<header class="border-b border-gray-800">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold tracking-wider">
            Le Crystal<span class="text-blue-500">-Club</span>
        </h1>

        <a href="{{ route('welcome') }}"
           class="px-4 py-2 rounded-lg bg-gray-800 border border-gray-700
                  hover:bg-gray-700 transition text-sm font-semibold">
            Retour
        </a>
    </div>
</header>

<!-- TOOLBAR -->
<section class="max-w-7xl mx-auto px-6 py-10">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">

        <div class="flex items-center gap-4">
            <span class="material-icons text-4xl text-blue-400
                         drop-shadow-[0_0_10px_rgba(59,130,246,0.7)]">
                local_bar
            </span>

            <div>
                <h2 class="text-3xl font-extrabold tracking-wide
                           bg-gradient-to-r from-blue-400 via-cyan-300 to-blue-500
                           bg-clip-text text-transparent">
                    Boissons alcoolisées
                </h2>
                <p class="text-gray-400 text-sm mt-1">
                    Sélection premium du Crystal-Club
                </p>
            </div>
        </div>

        <div class="flex flex-wrap gap-3">
            <a href="{{ route('menus.boissons.sucree') }}"
               class="px-5 py-2 rounded-xl font-semibold border
               {{ request()->routeIs('menus.boissons.sucree')
                    ? 'bg-blue-600 border-blue-500'
                    : 'bg-gray-800 border-gray-700 hover:bg-gray-700' }}">
                Sucrées
            </a>

            <a href="{{ route('menus.boissons.alcool') }}"
               class="px-5 py-2 rounded-xl font-semibold border
               {{ request()->routeIs('menus.boissons.alcool')
                    ? 'bg-blue-600 border-blue-500'
                    : 'bg-gray-800 border-gray-700 hover:bg-gray-700' }}">
                Alcoolisées
            </a>

            <a href="{{ route('menus.plats.plat') }}"
               class="px-5 py-2 rounded-xl bg-gradient-to-r
                      from-blue-600 to-indigo-600
                      hover:from-indigo-600 hover:to-blue-600
                      transition font-semibold">
                Voir les plats
            </a>
        </div>

    </div>
</section>

<!-- CONTENU -->
<main class="max-w-7xl mx-auto px-6 mb-20">

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

        @php
            $currentType = null;
        @endphp

        @forelse($boissons as $item)

            {{-- TITRE DE SECTION PAR TYPE (STYLE IDENTIQUE À L’IMAGE) --}}
            @if($item->type !== $currentType)
                <div class="col-span-full mt-12 mb-6">
                    <div class="glass-crystal px-6 py-3 rounded-xl text-center">
                        <h2 class="text-lg font-bold text-3xl font-extrabold tracking-wide
                           bg-gradient-to-r from-blue-400 via-cyan-300 to-blue-500
                           bg-clip-text text-transparent tracking-wide uppercase">
                            {{ ucfirst($item->type) }}
                        </h2>
                    </div>
                </div>

                @php
                    $currentType = $item->type;
                @endphp
            @endif


            <div class="glass-crystal glass-delay-{{ $loop->iteration % 4 + 1 }}
                        rounded-2xl shadow-xl transition overflow-hidden">

                <!-- IMAGE -->
                @if(!empty($item->thumbnail))
                    <div class="h-48 w-full overflow-hidden">
                        <img src="{{ asset('storage/boissons/'.$item->thumbnail) }}"
                             alt="{{ $item->nom }}"
                             class="w-full h-full object-cover"
                             loading="lazy">
                    </div>
                @elseif(!empty($item->image))
                    <div class="h-48 w-full overflow-hidden">
                        <img src="{{ asset('storage/boissons/'.$item->image) }}"
                             alt="{{ $item->nom }}"
                             class="w-full h-full object-cover"
                             loading="lazy">
                    </div>
                @else
                    <div class="h-48 bg-gray-800 flex items-center justify-center text-gray-500">
                        Aucune image
                    </div>
                @endif

                <!-- TEXTE -->
                <div class="p-6 flex items-center justify-between gap-4">
                    <span class="text-lg font-bold text-white">
                        {{ number_format($item->prix, 0) }} $
                    </span>

                    <h3 class="text-xl font-bold text-blue-300 text-right leading-tight">
                        {{ $item->nom }}
                    </h3>
                </div>

            </div>

        @empty
            <p class="col-span-full text-center text-gray-400">
                Aucune boisson disponible
            </p>
        @endforelse

    </div>

    <!-- PAGINATION (INCHANGÉE) -->
    <div class="mt-12">
        {{ $boissons->links() }}
    </div>

</main>

<!-- FOOTER -->
<footer class="border-t border-gray-800 py-12 text-center">
    <h3 class="text-2xl font-bold tracking-wide">
        Le Crystal<span class="text-blue-500">-Club</span>
    </h3>

    <p class="text-gray-400 text-sm mt-2">
        Ambiance • Élégance • Excellence
    </p>

    <p class="mt-6 text-gray-500 text-xs">
        © {{ date('Y') }} Le Crystal-Club — Tous droits réservés
    </p>
</footer>

<script>
    lucide.createIcons();
</script>

</body>
</html>
