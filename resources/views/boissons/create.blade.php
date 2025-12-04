
<h1 class="text-2xl font-bold mb-4">Add Drinks</h1>

<!-- Message de succès -->
@if(session('success'))
<div class="bg-green-200 p-3 mb-3 rounded">
    {{ session('success') }}
</div>
@endif

<!-- Affichage des erreurs -->
@if($errors->any())
<div class="bg-red-200 p-3 mb-3 rounded">
    <ul class="list-disc list-inside text-red-800">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('boissons.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Nom</label>
    <input type="text" name="nom" class="border w-full mb-3" value="{{ old('nom') }}">

    <label>Prix</label>
    <input type="number" name="prix" class="border w-full mb-3" value="{{ old('prix') }}" step="0.01">

    <label>Catégorie</label>
    <select name="categorie" class="border w-full mb-3">
        <option value="alcoolisee" {{ old('categorie') == 'alcoolisee' ? 'selected' : '' }}>Alcoolisée</option>
        <option value="sucree" {{ old('categorie') == 'sucree' ? 'selected' : '' }}>Sucrée</option>
    </select>

    <label>Image</label>
    <input type="file" name="image" class="border w-full mb-3">

    <button class="bg-blue-500 text-white p-2 rounded">Ajouter</button>
</form>
