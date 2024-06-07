<x-master title="Réservations">
  <div class="row my-2">
    @include('partials.flashbag')
  </div>

    <h5>Réservations en attente</h5>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Partenaire</th>
            <th scope="col">Date</th>
            <th scope="col">Service</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($reservations as $reservation)
          <tr>
            <th scope="row">{{$reservation->id}}</th>
            <td>{{$reservation->partenaire->Nom}}</td>
            <td>{{$reservation->Date}}</td>
            <td>{{$reservation->service->Nom}}</td>
            <form action="/reservation/{{$reservation->id}}" method="POST">
              @method('DELETE')
              @csrf
              <td><button class="btn btn-danger">Supprimer</button></td>
          </form>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $reservations->links() }}

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script>
        //une fonctionnalité pour supprimer automatiquement les réservations anciennes plus 48h.
          $(document).ready(function() {
              $.get('/delete-old-reservations', function(response) {
                  console.log(response); // Vous pouvez afficher la réponse dans la console pour le débogage
                  // Actualisez la page si nécessaire
                  location.reload();
              });
          });
      </script>
      {{ $reservations->links() }}
</x-master>
