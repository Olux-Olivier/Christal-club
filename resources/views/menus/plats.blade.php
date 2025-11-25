<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Christal Club - Menu Plats</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black text-gray-200">

    <header class="text-center py-10 bg-black/60">
        <h1 class="text-4xl font-bold text-yellow-500 uppercase tracking-wide">Le Christal Club</h1>
        <p class="text-gray-400 italic mt-2">Menu des plats</p>
    </header>

    <section class="max-w-3xl mx-auto p-6">

        <div class="border-b border-gray-700 pb-2 mb-6">
            <h2 class="text-2xl text-yellow-500 font-semibold">Plats principaux</h2>
        </div>

        <div class="space-y-3">
            <div class="flex justify-between">
                <span>Poulet grillé</span>
                <span class="text-yellow-500">$12</span>
            </div>

            <div class="flex justify-between">
                <span>Spaghetti Bolognaise</span>
                <span class="text-yellow-500">$10</span>
            </div>

            <div class="flex justify-between">
                <span>Brochette viande</span>
                <span class="text-yellow-500">$8</span>
            </div>
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('boissons') }}"
                class="px-6 py-3 border border-yellow-500 text-yellow-500 rounded-lg hover:bg-yellow-500 hover:text-black transition">
                Voir les Boissons →
            </a>
        </div>
    </section>
</body>
</html>

