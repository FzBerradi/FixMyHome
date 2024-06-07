<x-masterPartenaire title="Profile client">
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
        </div>
        <br>
        <br>
        <section id="testimonials" class="section-p1">
            <h5>Commentaires Partenaires:</h5>
            <div class="testimonial-container">
                @foreach ($client->reservations as $reservation)
                    <div class="testimonial-box">
                        <div class="box-top">
                            <i class="fas fa-quote-left"></i>
                            <p>{{ $reservation->service->Nom }}</p>
                            @if ($reservation->Commentaire_Partenaire)
                                <p>{{ $reservation->Commentaire_Partenaire }}</p>
                            @else
                                <p>Aucun commentaire du partenaire.</p>
                            @endif
                        </div>
                        <div class="partner">
                            <p>Partenaire</p>
                        </div>
                    </div>
                @endforeach
                @if ($client->reservations->isEmpty())
                    <p>Aucun commentaire disponible.</p>
                @endif
            </div>
        </section>
    </div>
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Retour</a>
</x-masterPartenaire>
