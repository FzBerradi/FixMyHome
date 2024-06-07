<x-masterAdmin title="Liste Clients">
  <div class="row my-2">
    @include('partials.flashbag')

</div>
        <h3>Liste des clients:</h3>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Ville</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
              <tr>
                
                <th scope="row">{{$client->id}}</th>
                <td>{{$client->Nom}}</td>
                <td>{{$client->Ville}}</td>
                <td><a href="/voirClient/{{$client->id}}"><button class="btn btn-info">Voir</button></a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $clients->links() }}
            
    
    </x-masterAdmin>