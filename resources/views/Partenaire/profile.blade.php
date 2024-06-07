<x-masterPartenaire title="Mon profil" >
    <div class="user-profile">
        <div class="row my-2">
            @include('partials.flashbag')

        </div>
        <div class="profile-form">
            
            <label>NOM</label>
            <input type="text"  placeholder="{{auth('partenaire')->user()->Nom}}" readonly>
            
            <label for="email">EMAIL</label>
            <input type="email"  placeholder="{{auth('partenaire')->user()->email}}" readonly>
            
            <label>Nombre d'experience</label>
            <input type="number"  placeholder="{{auth('partenaire')->user()->NbExperience}}" readonly>

            <label>Téléphone</label>
            <input type="text"  placeholder="{{auth('partenaire')->user()->NumTel}}" readonly>
            
            
            <label>VILLE</label>
            <input type="text" placeholder="{{auth('partenaire')->user()->Ville}}" readonly>

            <label>Disponibilite</label>
            <input type="text" placeholder="{{auth('partenaire')->user()->Disponibilite_Jours}}" readonly>
            <label>Services</label>
            <input type="text" placeholder="{{auth('partenaire')->user()->Services}}" readonly>
            
            
            
            <form action="{{route('partenaire.edit',$id)}}"  method="GET">
                @csrf
            <button type="submit" class="btn-edit">Modifier</button>
        </form>
    </div>
    </div>
    
</x-masterPartenaire>