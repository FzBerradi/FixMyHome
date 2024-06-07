<x-master title="Mon profil" >
    <div class="user-profile">
        <form  action="{{route('client.update',$client->id)}}" method="POST" class="profile-form">
            @method('PUT')
            @csrf
            <label>NOM</label>
            <input type="text"  name="Nom" value="{{$client->Nom}}" >
            
            <label>EMAIL</label>
            <input type="email" name="email" value="{{$client->email}}" >
            
            <label>VILLE</label>
            <input type="text" name="Ville" value="{{$client->Ville}}" >
            
            <label>ADRESSE</label>
            <input type="text" name='Adresse' value="{{$client->Adresse}}" >
            
            <button type="submit" class="btn-edit">Valider</button>
        </form>
    </div>
    
</x-master>