<H1> Add drinks</H1>
@if(session('success'))
<div class="bg-green-200 p-3 mb-3">{{ session('success') }}</div>
@endif

<form action="{{ route('boissons.store') }}" method="POST">
    @csrf

    <label>Nom</label>
    <input type="text" name="nom" class="border w-full mb-3">

    <label>Prix</label>
    <input type="text" name="prix" class="border w-full mb-3">

    <label>Catégorie</label>
    <select name="categorie" class="border w-full mb-3">
        <option value="alcoolisee">Alcoolisée</option>
        <option value="sucree">Sucrée</option>
    </select>

    <button class="bg-blue-500 text-white p-2">Ajouter</button>

</form>
