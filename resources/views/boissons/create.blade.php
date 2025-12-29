<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Le Crystal-Club | Ajouter une boisson</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Police élégante -->
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
</head>

<body class="font-poppins bg-gradient-to-br from-black via-gray-900 to-black min-h-screen">

<!-- Header -->
<header class="border-b border-gray-800">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-white tracking-wider">
            Le Crystal<span class="text-blue-500">-Club</span>
        </h1>

        <nav class="space-x-6 text-gray-300 text-sm">
            <a href="{{ route('dashboard') }}" class="hover:text-white transition">Dashboard</a>
        </nav>
    </div>
</header>

<!-- Contenu principal -->
<main class="flex items-center justify-center py-12 px-6">
    <div class="w-full max-w-xl bg-gray-900 border border-gray-800 rounded-2xl shadow-2xl p-8">

        <!-- Titre -->
        <h2 class="text-3xl font-extrabold text-center text-white mb-8 tracking-wide">
            🍸 Ajouter une boisson
        </h2>

        <!-- Message succès -->
        @if(session('success'))
            <div class="bg-green-600/20 border border-green-600 text-green-300 p-3 mb-4 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- Erreurs -->
        @if($errors->any())
            <div class="bg-red-600/20 border border-red-600 p-3 mb-4 rounded-lg">
                <ul class="text-red-300 text-sm list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulaire -->
        <form action="{{ route('boissons.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Nom -->
            <div>
                <label class="block text-sm text-gray-300 mb-1">Nom de la boisson</label>
                <input
                    type="text"
                    name="nom"
                    value="{{ old('nom') }}"
                    placeholder="Ex : Whisky Royal"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <!-- Prix -->
            <div>
                <label class="block text-sm text-gray-300 mb-1">Prix ($)</label>
                <input
                    type="number"
                    step="0.01"
                    name="prix"
                    value="{{ old('prix') }}"
                    placeholder="Ex : 15.00"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <!-- Catégorie -->
            <div>
                <label class="block text-sm text-gray-300 mb-1">Catégorie</label>
                <select
                    name="categorie"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    <option value="alcoolisee" {{ old('categorie') == 'alcoolisee' ? 'selected' : '' }}>
                        🍾 Alcoolisée
                    </option>
                    <option value="sucree" {{ old('categorie') == 'sucree' ? 'selected' : '' }}>
                        🧃 Sucrée
                    </option>
                </select>
            </div>

            <!-- Image -->
            <div>
                <label class="block text-sm text-gray-300 mb-1">Image</label>
                <input
                    type="file"
                    name="image"
                    class="w-full text-gray-300 bg-gray-800 border border-gray-700 rounded-lg
                               file:bg-blue-600 file:text-white file:border-0
                               file:px-4 file:py-2 file:rounded-lg
                               file:cursor-pointer hover:file:bg-blue-700"
                >
            </div>

            <!-- Bouton -->
            <button
                type="submit"
                class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-indigo-600 hover:to-blue-600
                           text-white py-3 rounded-xl font-semibold tracking-wide transition duration-300"
            >
                Ajouter la boisson
            </button>
        </form>

    </div>
</main>

<!-- Footer -->
<footer class="border-t border-gray-800 mt-12">
    <div class="max-w-7xl mx-auto px-6 py-4 text-center text-gray-500 text-sm">
        © {{ date('Y') }} Le Crystal-Club — Tous droits réservés
    </div>
</footer>

</body>
</html>
