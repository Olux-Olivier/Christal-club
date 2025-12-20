<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard – Chrystal Club</title>
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

        .delay-1::before { animation-delay: 0s; }
        .delay-2::before { animation-delay: 2s; }
        .delay-3::before { animation-delay: 4s; }
        .delay-4::before { animation-delay: 6s; }
    </style>
</head>

<body class="bg-gradient-to-br from-black via-gray-900 to-black text-white min-h-screen">

<!-- HEADER -->
<header class="border-b border-gray-800">
    <div class="max-w-7xl mx-auto px-6 py-6 flex justify-between items-center">

        <h1 class="text-2xl font-bold tracking-wider">
            Chrystal<span class="text-blue-500">-Club</span>
        </h1>

        <span class="text-sm text-gray-400">
            Dashboard interne
        </span>
    </div>
</header>

<section class="max-w-7xl mx-auto px-6 py-12">
    <div class="flex items-center gap-4">
        <span class="material-icons text-5xl text-blue-400
                     drop-shadow-[0_0_12px_rgba(59,130,246,0.7)]">
            dashboard
        </span>

        <div>
            <h2 class="text-4xl font-extrabold tracking-wide
                       bg-gradient-to-r from-blue-400 via-cyan-300 to-blue-500
                       bg-clip-text text-transparent">
                Dashboard
            </h2>
            <p class="text-gray-400 mt-1">
                Gestion interne des menus
            </p>
        </div>
    </div>
</section>

<main class="max-w-7xl mx-auto px-6 pb-24">

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

        <!-- PLATS -->
        <div class="glass-crystal delay-1 rounded-2xl p-7 shadow-xl">
            <h3 class="text-xl font-bold text-yellow-300 flex items-center gap-2">
                <i data-lucide="utensils"></i> Plats
            </h3>

            <p class="text-white/70 text-sm mt-2">
                Plats principaux
            </p>

            <p class="mt-8 text-5xl font-bold">
                {{ $platsCount }}
            </p>

            <a href="#"
               class="inline-block mt-8 px-6 py-2 rounded-full
                      bg-white/20 backdrop-blur border border-white/30
                      hover:bg-white/30 transition font-semibold">
                Consulter
            </a>
        </div>

        <div class="glass-crystal delay-2 rounded-2xl p-7 shadow-xl">
            <h3 class="text-xl font-bold text-yellow-200 flex items-center gap-2">
                <i data-lucide="layers"></i> Autres plats
            </h3>

            <p class="text-white/70 text-sm mt-2">
                Accompagnements & spécialités
            </p>

            <p class="mt-8 text-5xl font-bold">
                0
            </p>

            <a href="#"
               class="inline-block mt-8 px-6 py-2 rounded-full
                      bg-white/20 backdrop-blur border border-white/30
                      hover:bg-white/30 transition font-semibold">
                Consulter
            </a>
        </div>

        <div class="glass-crystal delay-3 rounded-2xl p-7 shadow-xl">
            <h3 class="text-xl font-bold text-blue-300 flex items-center gap-2">
                <i data-lucide="coffee"></i> Boissons sucrées
            </h3>

            <p class="text-white/70 text-sm mt-2">
                Jus, sodas & cocktails soft
            </p>

            <p class="mt-8 text-5xl font-bold">
                {{ $boissonsSucrees }}
            </p>

            <a href="{{ route('boissons.liste_sucree') }}"
               class="inline-block mt-8 px-6 py-2 rounded-full
                      bg-white/20 backdrop-blur border border-white/30
                      hover:bg-white/30 transition font-semibold">
                Consulter
            </a>
        </div>

        <div class="glass-crystal delay-4 rounded-2xl p-7 shadow-xl">
            <h3 class="text-xl font-bold text-red-300 flex items-center gap-2">
                <i data-lucide="wine"></i> Boissons alcoolisées
            </h3>

            <p class="text-white/70 text-sm mt-2">
                Bières, vins & spiritueux
            </p>

            <p class="mt-8 text-5xl font-bold">
                {{ $boissonsAlcool }}
            </p>

            <a href="{{ route('boissons.liste_alcool') }}"
               class="inline-block mt-8 px-6 py-2 rounded-full
                      bg-white/20 backdrop-blur border border-white/30
                      hover:bg-white/30 transition font-semibold">
                Consulter
            </a>
        </div>

        <!-- SHISHA -->
        <div class="glass-crystal delay-1 rounded-2xl p-7 shadow-xl">
            <h3 class="text-xl font-bold text-purple-300 flex items-center gap-2">
                <i data-lucide="flame"></i> Shisha
            </h3>

            <p class="text-white/70 text-sm mt-2">
                Parfums & options
            </p>

            <p class="mt-8 text-5xl font-bold">
                0
            </p>

            <a href="#"
               class="inline-block mt-8 px-6 py-2 rounded-full
                      bg-white/20 backdrop-blur border border-white/30
                      hover:bg-white/30 transition font-semibold">
                Consulter
            </a>
        </div>

    </div>

</main>

<!-- FOOTER -->
<footer class="border-t border-gray-800 py-10 text-center text-gray-400 text-sm">
    © {{ date('Y') }} Chrystal-Club — Gestion interne
</footer>

<script>
    lucide.createIcons();
</script>

</body>
</html>
