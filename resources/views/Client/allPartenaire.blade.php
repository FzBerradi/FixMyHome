<x-master title="Liste partenaires">
    <form method="GET" action="/recherche-partenaires">
        <div class="search-bar">
            <input type="search" name="search" id="search-partners" placeholder="Rechercher un partenaire par son nom, nombre d'exeprience ou sa notation" aria-label="Rechercher">
            <select name="note" id="note">
                <option value="">Toutes les notes</option>
                <option value="mauvais">Mauvaises notes</option>
                <option value="bon">Bonnes notes</option>
            </select>
            <button type="submit" class="btn-search">Rechercher</button>
        </div>
    </form>
    <div class="partner-list">
        @forelse ($partenaires as $partenaire)
            <div class="partner-card">
                <div class="card-header">
                    <img src="{{ asset('storage/' . $partenaire->Photo) }}" alt="Profile Avatar" class="avatar10">
                    <h6>Nom : {{$partenaire->Nom}}</h6>
                </div>
                <p>Ville : {{$partenaire->Ville}}</p>
                <a href="/profilePartenaire/{{$partenaire->id}}"><button class="profile-button">Afficher le profil</button></a>
                <a href="/selectionnerPartenaire/{{$partenaire->id}}"><button class="select-button">Sélectionner le profil</button></a>
            </div>
        @empty
            <p>Aucun partenaire trouvé.</p>
        @endforelse
    </div>
    {{ $partenaires->links() }}
</x-master>
