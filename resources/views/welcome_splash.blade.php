<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Christal Club</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Animation fade + zoom */
        @keyframes fadeZoom {
            0% { opacity: 0; transform: scale(0.85); }
            100% { opacity: 1; transform: scale(1); }
        }
        .animate-text {
            opacity: 0;
            animation: fadeZoom 1.5s ease-out forwards;
        }

        /* Effet glace */
        .glass-overlay {
            backdrop-filter: blur(12px) saturate(150%);
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body class="relative h-screen flex items-center justify-center">

    <!-- Image de fond fixe -->
    <div class="fixed inset-0 bg-cover bg-center -z-10"
         style="background-image: url('https://images.pexels.com/photos/262978/pexels-photo-262978.jpeg');">
    </div>

    <!-- Overlay sombre + effet glace -->
    <div class="fixed inset-0 glass-overlay -z-5"></div>

    <!-- Contenu principal -->
    <div class="text-center px-6 py-8 glass-overlay animate-text">
        <h1 class="text-4xl md:text-5xl font-bold text-white uppercase tracking-wider drop-shadow-lg">
            Bienvenue au Christal Club
        </h1>

        <p class="mt-4 text-lg md:text-xl text-white/90 tracking-wide">
            Votre expérience commence ici...
        </p>
    </div>

    <script>
        // Redirection après 2 secondes
        setTimeout(function () {
            window.location.href = "{{ route('menus.boissons.sucree') }}";
        }, 2000);
    </script>

</body>
</html>
