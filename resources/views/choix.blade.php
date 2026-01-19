<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Le Crystal-Club | Choisir l’espace</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

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

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .glass {
            background: linear-gradient(
                135deg,
                rgba(255,255,255,0.15),
                rgba(255,255,255,0.05)
            );
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border: 1px solid rgba(255,255,255,0.2);
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-black via-gray-900 to-black text-white flex items-center justify-center">

    <div class="max-w-4xl w-full px-6 text-center">

        <!-- TITRE -->
        <h1 class="text-4xl md:text-5xl font-extrabold tracking-wide mb-4">
            Le Crystal<span class="text-blue-500">-Club</span>
        </h1>

        <p class="text-gray-400 mb-12">
            Choisissez votre espace pour découvrir nos délicieux menus !
        </p>

        <!-- BOUTONS -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-3xl mx-auto">

            <!-- RESTAURANT -->
            <a href="{{ route('menus.boissonsResto.sucree') }}"
               class="glass rounded-2xl px-8 py-10
                      group hover:scale-[1.03]
                      transition duration-300 shadow-lg">

                <div class="text-4xl mb-4">🍽</div>

                <h2 class="text-2xl font-bold mb-2">
                    Restaurant
                </h2>

                <p class="text-gray-300 text-sm">
                    Ambiance calme et raffinée
                </p>

            </a>

            <!-- CLUB -->
            <a href="{{ route('menus.boissons.alcool') }}"
               class="glass rounded-2xl px-8 py-10
                      group hover:scale-[1.03]
                      transition duration-300 shadow-lg">

                <div class="text-4xl mb-4">🎉</div>

                <h2 class="text-2xl font-bold mb-2 text-blue-400">
                    Club
                </h2>

                <p class="text-gray-300 text-sm">
                    Night Club life • Son • Lumière
                </p>

            </a>

        </div>

    </div>

</body>
</html>
