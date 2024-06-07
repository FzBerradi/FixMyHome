<x-masterPartenaire title="Mon profil">
    <div class="user-profile">
        <form action="{{ route('partenaire.update', $partenaire->id) }}" method="POST" class="profile-form">
            @csrf
            @method('PUT') 
            @error('email')
                    
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            <label>NOM</label>
            <input type="text" name="Nom" value="{{ $partenaire->Nom }}" required>
            
            <label>EMAIL</label>
            <input type="email" name="email" value="{{ $partenaire->email }}" required>
            
            <label>Nombre d'experience</label>
            <input type="number" name="NbExperience" value="{{ $partenaire->NbExperience }}" required>
            
            <label>Telephone</label>
            <input type="text" name="NumTel" value="{{ $partenaire->NumTel }}" required>

            <label>VILLE</label>
            <input type="text" name="Ville" value="{{ $partenaire->Ville }}" required>
            
            <label>Disponibilite</label>
            <input type="text" name="Disponibilite_Jours" value="{{ $partenaire->Disponibilite_Jours }}" required>
            
            <label>Services</label>
            <input type="text" name="Services" value="{{ $partenaire->Services }}" required>
            
            <button type="submit" class="btn-edit">Valider</button>
        </form>
    </div>
</x-masterPartenaire>
