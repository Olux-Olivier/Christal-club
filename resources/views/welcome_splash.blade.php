<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Christal Club</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Animation glow */
        @keyframes neonPulse {
            0%, 100% {
                text-shadow:
                    0 0 10px rgba(59,130,246,.6),
                    0 0 30px rgba(59,130,246,.4);
            }
            50% {
                text-shadow:
                    0 0 20px rgba(96,165,250,.9),
                    0 0 50px rgba(96,165,250,.6);
            }
        }

        /* Apparition */
        @keyframes rise {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .neon-title {
            animation: neonPulse 2.5s ease-in-out infinite;
        }

        .fade-up {
            animation: rise 1.2s ease-out forwards;
        }
    </style>
</head>

<body class="h-screen flex items-center justify-center
             bg-gradient-to-br from-black via-gray-950 to-black text-white">

<!-- Halo central -->
<div class="absolute w-[500px] h-[500px] rounded-full
                bg-blue-600/10 blur-3xl"></div>

<!-- Contenu -->
<div class="relative text-center px-8 fade-up">

    <h1 class="text-4xl md:text-6xl font-extrabold uppercase tracking-[0.2em]
                   neon-title">
        Le Crystal Club
    </h1>

    <div class="w-24 h-[2px] bg-gradient-to-r
                    from-transparent via-blue-500 to-transparent
                    mx-auto my-6"></div>

    <p class="text-base md:text-lg text-gray-300 tracking-wide">
        Night • Lounge • Experience
    </p>
</div>

<script>
    setTimeout(() => {
        window.location.href = "{{ route('choixespace') }}";
    }, 2000);
</script>

</body>
</html>
