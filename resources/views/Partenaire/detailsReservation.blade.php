<x-masterPartenaire title="Détails de la Réservation">
    <div class="containerP mt-5">
        <div class="card">
            <div class="card-headerP">
                Détails de la Réservation
            </div>
            <div class="card-bodyP">
                <br>
                <h5 class="card-titleP">Information sur le Client</h5>
                <p class="card-text"><strong>Nom :</strong> {{ $reservation->client->Nom }}</p>
                <p class="card-text"><strong>Ville :</strong> {{ $reservation->client->Ville }}</p>
                <a href="/profileClient/{{$reservation->client->id}}"><button class="btn btn-secondary"">Afficher le profil</button></a>
                <h5 class="card-titleP mt-4">Information sur le Service</h5>
                <p class="card-text"><strong>Service :</strong> {{ $reservation->service->Nom }}</p>
                <p class="card-text"><strong>Date de réservation :</strong> {{ $reservation->Date }}</p>
                <p class="card-text"><strong>Durée de service :</strong> {{ $reservation->Duree }}</p>
                <p class="card-text"><strong>Prix :</strong> {{ $reservation->Prix }}</p>
                <p class="card-text"><strong>Adresse :</strong> {{ $reservation->client->Adresse }}</p>
                <p class="card-text"><strong>Détails supplémentaires :</strong> {{ $reservation->Inf }}</p>
            </div>

        </div>

<br>
        <div class="d-flex justify-content-around">

            <form action="/reservations/{{$reservation->id}}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger">Refuser</button>
            </form>
            <form action="/reservations/accept/{{$reservation->id}}" method="POST" class="mr-2">
                @csrf
                <button class="btn btn-success">Accepter</button>
            </form>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Retour</a>
        </div>

    </div>
    <br>

</x-masterPartenaire>
