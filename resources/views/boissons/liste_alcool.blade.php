<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Boissons alcoolisées – Chrystal Club</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
                rgba(255,255,255,0.14),
                rgba(255,255,255,0.03)
            );
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border: 1px solid rgba(255,255,255,0.18);
            overflow: hidden;
        }

        .glass-crystal::before {
            content: "";
            position: absolute;
            top: -60%;
            left: -90%;
            width: 60%;
            height: 220%;
            background: linear-gradient(
                120deg,
                transparent 35%,
                rgba(255,255,255,0.4),
                transparent 65%
            );
            transform: rotate(25deg);
            animation: crystalSweep 8s linear infinite;
            pointer-events: none;
        }

        @keyframes crystalSweep {
            0% { left: -90%; opacity: 0; }
            20% { opacity: .5; }
            50% { opacity: .8; }
            80% { opacity: .5; }
            100% { left: 130%; opacity: 0; }
        }
    </style>
</head>

<body class="bg-gradient-to-br from-black via-gray-900 to-black text-white min-h-screen">

<!-- HEADER -->
<header class="border-b border-gray-800">
    <div class="max-w-7xl mx-auto px-6 py-6 flex justify-between items-center">

        <h1 class="text-2xl font-bold tracking-wider">
            Chrystal<span class="text-blue-500">-Club</span>
        </h1>

        <a href="{{ route('dashboard') }}"
           class="text-sm text-gray-400 hover:text-white transition">
            Dashboard
        </a>
    </div>
</header>

<!-- CONTENU -->
<section class="max-w-7xl mx-auto px-6 py-12">

    <!-- TITRE -->
    <div class="flex items-center gap-4 mb-10">
        <span class="material-icons text-5xl text-red-400
                     drop-shadow-[0_0_12px_rgba(248,113,113,0.7)]">
            wine_bar
        </span>

        <div>
            <h2 class="text-4xl font-extrabold tracking-wide
                       bg-gradient-to-r from-red-400 via-pink-300 to-red-500
                       bg-clip-text text-transparent">
                Gestion – Boissons alcoolisées
            </h2>
            <p class="text-gray-400 mt-1">
                Bières, vins & spiritueux
            </p>
        </div>
    </div>

    <!-- MESSAGE SUCCESS -->
    @if(session('success'))
        <div class="mb-6 px-5 py-3 rounded-xl
                    bg-green-500/10 border border-green-500/30
                    text-green-300 font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <!-- ACTIONS -->
    <div class="flex flex-wrap gap-4 mb-8">
        <a href="{{ route('boissons.create') }}"
           class="px-6 py-2 rounded-full
                  bg-white/20 backdrop-blur border border-white/30
                  hover:bg-white/30 transition font-semibold">
            + Ajouter une boisson
        </a>

        <a href="{{ route('dashboard') }}"
           class="px-6 py-2 rounded-full
                  bg-white/10 backdrop-blur border border-white/20
                  hover:bg-white/20 transition font-semibold text-gray-300">
            Retour
        </a>
    </div>

    <!-- TABLE -->
    <div class=" rounded-2xl shadow-xl overflow-hidden">

        <table class="min-w-full text-left">
            <thead class="bg-white/10 border-b border-white/20">
            <tr class="text-gray-300 uppercase text-sm tracking-wider">
                <th class="px-6 py-4">Nom</th>
                <th class="px-6 py-4">Prix</th>
                <th class="px-6 py-4">Actions</th>
            </tr>
            </thead>

            <tbody class="divide-y divide-white/10">
            @forelse($boissons as $boisson)
                <tr class="hover:bg-white/5 transition">
                    <td class="px-6 py-4 font-semibold">
                        {{ $boisson->nom }}
                    </td>

                    <td class="px-6 py-4 text-gray-300">
                        {{ $boisson->prix }} $
                    </td>

                    <td class="px-6 py-4 flex items-center gap-4">
                        <a href="{{ route('boissons.edit', $boisson->id) }}"
                           class="text-blue-400 hover:text-blue-300 font-semibold">
                            Modifier
                        </a>

                        <form action="{{ route('boissons.destroy', $boisson->id) }}"
                              method="POST"
                              onsubmit="return confirm('Supprimer cette boisson ?')">
                            @csrf
                            @method('DELETE')

                            <button class="text-red-400 hover:text-red-300 font-semibold">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center py-12 text-gray-400">
                        Aucune boisson alcoolisée enregistrée
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>

    </div>

</section>

<!-- FOOTER -->
<footer class="border-t border-gray-800 py-10 text-center text-gray-400 text-sm">
    © {{ date('Y') }} Chrystal-Club — Gestion interne
</footer>

<script>
    lucide.createIcons();
</script>

</body>
</html>
