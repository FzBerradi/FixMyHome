<x-master title="Services Réalisés">
<div class="row my-2">
    @include('partials.flashbag')
    @if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif
</div>
    <h5>Services réalisés</h5>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Partenaire</th>
            <th scope="col">Date</th>
            <th scope="col">Service</th>
            <th scope="col">Commentaire</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($services as $serviceR)
        <tr>
            <th scope="row">{{$serviceR->id}}</th>
            <td>{{$serviceR->partenaire->Nom}}</td>
            <td>{{$serviceR->Date}}</td>
            <td>{{$serviceR->service->Nom}}</td>
            <td>
            <div class="btn-group">
                @if ($serviceR->Commentaire_Client)
                <button type="button" class="btn btn-secondary" disabled>Ajouter</button>
                @else
                <form action="{{route('reservation.addCom',$serviceR->id)}}"  method="GET">
                    @csrf
                <button type="submit" class="btn btn-info">Ajouter</button>
                </form>
                @endif
                <a href="/voirCom/{{$serviceR->id}}"><button class="btn btn-outline-info">Voir</button></a>
            </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $services->links()}}
</x-master>
