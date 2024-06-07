<x-masterAdmin title="Profile partenaire" >
    <div class="partner-profile">
        <div class="card-header">
            <img src="{{$partenaire->Photo}}" alt="Avatar" class="avatar10">
            <h6>Nom : {{$partenaire->Nom}}</h6>
        </div>
        <br>
        <div class="additional-info">
            <div class="info-item">
                <span class="label">NOM</span>
                <span class="value">{{$partenaire->Nom}}</span>
            </div>
            <div class="info-item">
                <span class="label">Email</span>
                <span class="value">{{$partenaire->Email}}</span>
            </div>
            <div class="info-item">
                <span class="label">Ville</span>
                <span class="value">{{$partenaire->Ville}}</span>
            </div>
            <div class="info-item">
                <span class="label">DISPONIBILITÉ</span>
                <span class="value">{{$partenaire->Disponibilite_Jours}}</span>
            </div>
            <div class="info-item">
                <span class="label">TÉLÉPHONE</span>
                <span class="value">{{$partenaire->NumTel}}</span>
            </div>
            <div class="info-item">
                <span class="label">NOMBRE D'ANNÉE D'EXPÉRIENCE</span>
                <span class="value">{{$partenaire->NbExperience}}</span>
            </div>
        </div>
        <br>
        <br>
        <section id="testimonials" class="section-p1">
            <h5>Commentaires clients:</h5>
            
            <div class="testimonial-container">
                
                @forelse ($partenaire->reservations as $reservation)
                <div class="testimonial-box">
                    <div class="box-top">
                        
                        <i class="fas fa-quote-left"></i>
                        <p>{{ $reservation->service->Nom }}</p>
                        <p>{{ $reservation->Commentaire_Client }}</p>
                        @for ($i = 0; $i < $reservation->Note_Client; $i++)
                            <i class="fas fa-star"></i>
                        @endfor
                    </div>
                    <div class="customer">
                        <p>Client</p>
                    </div>
                </div>
            
                @empty
                <p>Aucun commentaire disponible.</p>
                @endforelse
            </div>
        </section>
        <br>
        <form action="/partenaire/{{$partenaire->id}}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger">Supprimer profil</button>
        </form>
        <br>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Retour</a>
    </div>
    
    
</x-masterAdmin>