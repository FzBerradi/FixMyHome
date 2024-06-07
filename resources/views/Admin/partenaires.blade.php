<x-masterAdmin title="Liste Partenaires">
  <div class="row my-2">
    @include('partials.flashbag')

</div>
        <h3>Liste des partenaires:</h3>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Photo</th>
                <th scope="col">Nom</th>
                <th scope="col">Ville</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($partenaires as $partenaire)
              <tr>
                
                <th scope="row">{{$partenaire->id}}</th>
                <td><img src={{$partenaire->Photo}} alt="Profile Avatar" class="avatar10"></td>
                <td>{{$partenaire->Nom}}</td>
                <td>{{$partenaire->Ville}}</td>
                <td><a href="/voirPartenaire/{{$partenaire->id}}"><button class="btn btn-info">Voir</button></a></td>
                
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $partenaires->links() }}
            
    
    </x-masterAdmin>