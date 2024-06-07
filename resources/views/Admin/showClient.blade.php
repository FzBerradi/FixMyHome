<x-masterAdmin title="Profile client" >
    <div class="partner-profile">
        <div class="card-header">
            <h6>Nom : {{$client->Nom}}</h6>
        </div>
        <br>
        <div class="additional-info">
            <div class="info-item">
                <span class="label">NOM</span>
                <span class="value">{{$client->Nom}}</span>
            </div>
            <div class="info-item">
                <span class="label">Ville</span>
                <span class="value">{{$client->Ville}}</span>
            </div>
            <div class="info-item">
                <span class="label">Adresse</span>
                <span class="value">{{$client->Adresse}}</span>
            </div>
            
            <div class="info-item">
                <span class="label">Email</span>
                <span class="value">{{$client->email}}</span>
            </div>
        </div>
        <br>
        <br>
        <section id="testimonials" class="section-p1">
            <h5>Commentaires Partenaires:</h5>
            <div class="testimonial-container">
                @forelse ($client->reservations as $reservation)
                <div class="testimonial-box">
                    <div class="box-top">
                        
                        <i class="fas fa-quote-left"></i>
                        <p>{{ $reservation->service->Nom }}</p>
                        <p>{{ $reservation->Commentaire_Partenaire }}</p>
                        
                    </div>
                    <div class="customer">
                        <p>{{ $reservation->partenaire->Nom }}</p>
                    </div>
                </div>
            
                @empty
                <p>Aucun commentaire disponible.</p>
                @endforelse
                 
            </div>
        </section>
        <br>
        <form action="/client/{{$client->id}}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger">Supprimer profil</button>
        </form>
        <br>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Retour</a>
    </div>
    
    
</x-masterAdmin>