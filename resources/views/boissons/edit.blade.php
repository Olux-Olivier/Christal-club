<h2>Modifier la boisson</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<form action="{{ route('boissons.update', $boisson->id) }}"
      method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <label>Nom</label><br>
        <input type="text" name="nom" value="{{ $boisson->nom }}">
    </div>

    <div>
        <label>Prix</label><br>
        <input type="number" name="prix" value="{{ $boisson->prix }}">
    </div>

    <div>
        <label>Image</label><br>
        <input type="file" name="image">
    </div>

    <br>
    <button type="submit">Enregistrer</button>
</form>
