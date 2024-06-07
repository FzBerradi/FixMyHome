<x-master title="Choisir Partenaire">
    <div class="partner-container">
        <h2>Choisir un partenaire</h2>
        <div class="partner-cards">
            @forelse ($partenaires as $partenaire)
                <div class="card">
                    <div class="card-header">
                        <img src="{{ asset('storage/' . $partenaire->Photo) }}" alt="Profile Avatar" class="avatar">
                        <h3>Nom : {{$partenaire->Nom}}</h3>
                    </div>
                    <p>Ville : {{$partenaire->Ville}}</p>
                    <a href="/profilePartenaire/{{$partenaire->id}}"><button class="profile-button">Afficher le profil</button></a>
                    <a href="/selectionnerPartenaire/{{$partenaire->id}}"><button class="select-button">Sélectionner le profil</button></a>
                </div>
            @empty
                <div class="no-partners">
                    <p>Aucun partenaire disponible pour le moment.</p><br><br><br>
                    <a href="/dashboard" class="btn btn-secondary leftA">Home</a>
                </div>
                
            @endforelse
        </div>
        @if ($partenaires->isNotEmpty())
            <a href="/plus"><button class="discover-more">Découvrir plus</button></a>
        @endif
    </div>
</x-master>
