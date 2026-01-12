<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Le Crystal Resto | Ajouter une boisson</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS -->
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
</head>

<body class="font-poppins bg-gradient-to-br from-black via-gray-900 to-black min-h-screen text-white">

<!-- HEADER -->
<header class="border-b border-gray-800">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold tracking-wider">
            Le Crystal<span class="text-blue-500">-Restaurant</span>
        </h1>

        <a href="{{ route('dashboard') }}" class="text-gray-300 text-sm hover:text-white transition">
            Dashboard
        </a>
    </div>
</header>

<!-- CONTENU -->
<main class="flex items-center justify-center py-12 px-6">
    <div class="w-full max-w-xl bg-gray-900 border border-gray-800 rounded-2xl shadow-2xl p-8">

        <!-- TITRE -->
        <h2 class="text-3xl font-extrabold text-center mb-8 tracking-wide">
            🍸 Ajouter une boisson
        </h2>

        <!-- SUCCESS -->
        @if(session('success'))
            <div class="bg-green-600/20 border border-green-600 text-green-300 p-3 mb-4 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- ERREURS -->
        @if($errors->any())
            <div class="bg-red-600/20 border border-red-600 p-3 mb-4 rounded-lg">
                <ul class="text-red-300 text-sm list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- FORMULAIRE -->
        <form action="{{ route('boissonsResto.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- NOM -->
            <div>
                <label class="block text-sm text-gray-300 mb-1">Nom</label>
                <input
                    type="text"
                    name="nom"
                    value="{{ old('nom') }}"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <!-- PRIX -->
            <div>
                <label class="block text-sm text-gray-300 mb-1">Prix ($)</label>
                <input
                    type="number"
                    step="0.01"
                    name="prix"
                    value="{{ old('prix') }}"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <!-- CATÉGORIE -->
            <div>
                <label class="block text-sm text-gray-300 mb-1">Catégorie</label>
                <select
                    id="categorie"
                    name="categorie"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500"
                >
                    <option value="">-- Choisir --</option>
                    <option value="alcoolisee" {{ old('categorie') == 'alcoolisee' ? 'selected' : '' }}>
                        Alcoolisée
                    </option>
                    <option value="sucree" {{ old('categorie') == 'sucree' ? 'selected' : '' }}>
                        Sucrée
                    </option>
                </select>
            </div>

            <!-- TYPE (ALCOOL UNIQUEMENT) -->
            <div id="type-alcool" class="hidden">
                <label class="block text-sm text-gray-300 mb-3">
                    Type d’alcool
                </label>

                <div class="grid grid-cols-2 gap-4">
                    @php
                        $types = [
                            'biere' => 'Bière',
                            'vin' => 'Vin',
                            'cider' => 'Cider',
                            'champagne' => 'Champagne',
                            'shisha'=>'Shisha',
                            'wisky'=> 'Wisky'
                        ];
                    @endphp

                    @foreach($types as $value => $label)
                        <label class="cursor-pointer">
                            <input
                                type="radio"
                                name="type"
                                value="{{ $value }}"
                                class="hidden peer"
                                {{ old('type') == $value ? 'checked' : '' }}
                            >
                            <div class="text-center px-4 py-3 rounded-lg
                                        bg-gray-800 border border-gray-700
                                        peer-checked:border-blue-500
                                        peer-checked:bg-blue-600/20
                                        hover:bg-gray-700 transition">
                                {{ $label }}
                            </div>
                        </label>
                    @endforeach
                </div>
            </div>

            <!-- IMAGE -->
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

            <!-- SUBMIT -->
            <button
                type="submit"
                class="w-full bg-gradient-to-r from-blue-600 to-indigo-600
                       hover:from-indigo-600 hover:to-blue-600
                       py-3 rounded-xl font-semibold tracking-wide transition"
            >
                Ajouter la boisson
            </button>

        </form>

    </div>
</main>

<!-- FOOTER -->
<footer class="border-t border-gray-800 mt-12">
    <div class="max-w-7xl mx-auto px-6 py-4 text-center text-gray-500 text-sm">
        © {{ date('Y') }} Le Crystal-Club
    </div>
</footer>

<!-- SCRIPT -->
<script>
    const categorieSelect = document.getElementById('categorie');
    const typeAlcool = document.getElementById('type-alcool');

    function toggleType() {
        if (categorieSelect.value === 'alcoolisee') {
            typeAlcool.classList.remove('hidden');
        } else {
            typeAlcool.classList.add('hidden');
        }
    }

    categorieSelect.addEventListener('change', toggleType);

    // Au chargement (old value)
    toggleType();
</script>

</body>
</html>

