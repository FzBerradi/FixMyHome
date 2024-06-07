<x-master title="Mon profil" >
    <div class="user-profile">
        <div class="row my-2">
            @include('partials.flashbag')

        </div>
        <div class="profile-form">
            
            <label>NOM</label>
            <input type="text"  placeholder="{{auth()->user()->Nom}}" readonly>
            
            <label for="email">EMAIL</label>
            <input type="email"  placeholder="{{auth()->user()->email}}" readonly>
            
            
            
            <label>VILLE</label>
            <input type="text" placeholder="{{auth()->user()->Ville}}" readonly>
            
            <label>ADRESSE</label>
            <input type="text"  placeholder="{{auth()->user()->Adresse}}" readonly>
            <form action="{{route('client.edit',$id)}}"  method="GET">
                @csrf
            <button type="submit" class="btn-edit">Modifier</button>
        </form>
    </div>
    </div>
    
</x-master>