<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard – Christal Club</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(25px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-up {
            animation: fadeUp 0.8s ease-out forwards;
        }
    </style>
</head>

<body class="text-white">

    <!-- 🌌 Background -->
    <div class="fixed inset-0 bg-cover bg-center -z-10"
         style="background-image:url('https://images.pexels.com/photos/1589919/pexels-photo-1589919.jpeg');
                filter: brightness(0.45);">
    </div>
    <div class="fixed inset-0 bg-black/40 -z-10"></div>

    <!-- HEADER -->
    <header class="py-10 text-center fade-up">
        <h1 class="text-4xl md:text-5xl font-bold drop-shadow-lg">
            Dashboard – Christal Club
        </h1>
        <p class="mt-3 text-white/80">
            Gestion interne des menus
        </p>
    </header>

    <!-- DASHBOARD -->
    <main class="max-w-7xl mx-auto px-6 pb-20">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- CARD -->
            <div class="bg-white/15 backdrop-blur-xl border border-white/20
                        rounded-2xl p-6 shadow-xl fade-up">
                <h3 class="text-xl font-bold text-yellow-300">
                    Nos plats
                </h3>
                <p class="mt-2 text-white/80 text-sm">
                    Plats principaux
                </p>

                <p class="mt-6 text-4xl font-bold">
                    0
                </p>

                <a href="#"
                   class="inline-block mt-6 px-5 py-2 rounded-full
                          bg-white/20 backdrop-blur border border-white/30
                          font-semibold hover:bg-white/30 transition">
                    Consulter
                </a>
            </div>

            <!-- AUTRES PLATS -->
            <div class="bg-white/15 backdrop-blur-xl border border-white/20
                        rounded-2xl p-6 shadow-xl fade-up">
                <h3 class="text-xl font-bold text-yellow-300">
                    Autres plats
                </h3>
                <p class="mt-2 text-white/80 text-sm">
                    Accompagnements & spécialités
                </p>

                <p class="mt-6 text-4xl font-bold">
                    0
                </p>

                <a href="#"
                   class="inline-block mt-6 px-5 py-2 rounded-full
                          bg-white/20 backdrop-blur border border-white/30
                          font-semibold hover:bg-white/30 transition">
                    Consulter
                </a>
            </div>

            <!-- BOISSONS SUCRÉES -->
            <div class="bg-white/15 backdrop-blur-xl border border-white/20
                        rounded-2xl p-6 shadow-xl fade-up">
                <h3 class="text-xl font-bold text-blue-300">
                    Boissons sucrées
                </h3>
                <p class="mt-2 text-white/80 text-sm">
                    Jus, sodas & cocktails soft
                </p>

                <p class="mt-6 text-4xl font-bold">
                    0
                </p>

                <a href="{{route('boissons.liste_sucree')}}"
                   class="inline-block mt-6 px-5 py-2 rounded-full
                          bg-white/20 backdrop-blur border border-white/30
                          font-semibold hover:bg-white/30 transition">
                    Consulter
                </a>
            </div>

            <!-- BOISSONS ALCOOLISÉES -->
            <div class="bg-white/15 backdrop-blur-xl border border-white/20
                        rounded-2xl p-6 shadow-xl fade-up">
                <h3 class="text-xl font-bold text-red-300">
                    Boissons alcoolisées
                </h3>
                <p class="mt-2 text-white/80 text-sm">
                    Bières, vins & spiritueux
                </p>

                <p class="mt-6 text-4xl font-bold">
                    0
                </p>

                <a href="{{route('boissons.liste_alcool')}}"
                   class="inline-block mt-6 px-5 py-2 rounded-full
                          bg-white/20 backdrop-blur border border-white/30
                          font-semibold hover:bg-white/30 transition">
                    Consulter
                </a>
            </div>

            <!-- SHISHA -->
            <div class="bg-white/15 backdrop-blur-xl border border-white/20
                        rounded-2xl p-6 shadow-xl fade-up">
                <h3 class="text-xl font-bold text-purple-300">
                    Shisha
                </h3>
                <p class="mt-2 text-white/80 text-sm">
                    Parfums & options
                </p>

                <p class="mt-6 text-4xl font-bold">
                    0
                </p>

                <a href="#"
                   class="inline-block mt-6 px-5 py-2 rounded-full
                          bg-white/20 backdrop-blur border border-white/30
                          font-semibold hover:bg-white/30 transition">
                    Consulter
                </a>
            </div>

        </div>
    </main>

    <!-- FOOTER -->
    <footer class="text-center py-10 text-white/70 text-sm">
        © {{ date('Y') }} Le Christal Club — Gestion interne
    </footer>

</body>
</html>

