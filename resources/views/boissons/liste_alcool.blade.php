<h2>Gestion – Boissons alcoolisées</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>Nom</th>
        <th>Prix</th>
        <th>Actions</th>
    </tr>

    <a href="{{ route('boissons.create') }}">Ajouter une boisson</a> <br>
    <a href="{{ route('dashboard')}}">Dashboard</a>

    @foreach($boissons as $boisson)
    <tr>
        <td>{{ $boisson->nom }}</td>
        <td>{{ $boisson->prix }} $</td>
        <td>
            <a href="{{ route('boissons.edit', $boisson->id) }}">
                Modifier
            </a>

            <form action="{{ route('boissons.destroy', $boisson->id) }}"
                  method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Supprimer cette boisson ?')">
                    Supprimer
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>


