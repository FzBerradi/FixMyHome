<x-masterPartenaire title="Réservations">
  <div class="row my-2">
    @include('partials.flashbag')
  </div>
    
    <h5>Réservations en attente</h5>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Client</th>
            <th scope="col">Date</th>
            <th scope="col">Service</th>
            <th scope="col">Prix</th>
            <th scope="col">Details</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($reservations as $reservation)
          <tr>
            <th scope="row">{{$reservation->id}}</th>
            <td>{{$reservation->client->Nom}}</td>
            <td>{{$reservation->Date}}</td>
            <td>{{$reservation->service->Nom}}</td>
            <td>{{$reservation->Prix}}</td>
            <td>
              <a href="/detailsReservation/{{$reservation->id}}"><button class="btn btn-info">Voir plus</button></a>
            </td>
            
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $reservations->links() }}
</x-masterPartenaire>