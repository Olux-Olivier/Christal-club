<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Plat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Conteneur principal -->
    <div class="max-w-lg mx-auto mt-16 bg-white shadow-2xl rounded-2xl p-8">

        <h1 class="text-3xl font-bold text-center text-blue-700 mb-6">🍽️ Ajouter un Plat</h1>

        <!-- Message success -->
        @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 mb-4 rounded-md">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('plats.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <!-- Nom -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Nom du plat</label>
                <input type="text" name="nom" required
                       class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-600 focus:border-blue-600">
            </div>

            <!-- Prix -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Prix ($)</label>
                <input type="number" name="prix" required
                       class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-600 focus:border-blue-600">
            </div>

            <!-- Catégorie -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Catégorie</label>
                <select name="categorie" required
                        class="w-full border border-gray-300 rounded-lg p-3 bg-white focus:ring-2 focus:ring-blue-600 focus:border-blue-600">
                    <option value="plat">Plat</option>
                    <option value="autres_plats">Autre Plat</option>
                </select>
            </div>

             <!-- Image-->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Image</label>
                <input type="file" name="image" required
                       class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-600 focus:border-blue-600">
            </div>

            <!-- Bouton -->
            <button
                class="w-full bg-blue-700 text-white font-semibold py-3 rounded-lg hover:bg-blue-900 transition">
                ➕ Ajouter
            </button>
        </form>

        <!-- Retour -->
        <div class="mt-6 text-center">
            <a href="/menus" class="text-blue-600 hover:underline">← Retour</a>
        </div>

    </div>

</body>
</html>
