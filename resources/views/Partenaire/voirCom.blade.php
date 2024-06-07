
<x-masterPartenaire title="Commentaires" >
    <br>
    <h5 class="m-3">ID Service Réalisé: {{$reservation->id}}</h5>
    <div class="comments-section">
        <div class="user-comment">
            <h6>Votre Commentaire:</h6>
            <p class="comment-text">{{$reservation->Commentaire_Partenaire}}</p>
            
            
        </div>
        
        <div class="partner-response">
            <h6>Commentaire du Client:</h6>
            <p class="comment-text">{{$reservation->Commentaire_Client}}</p>
            
        </div>
    </div>
    
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Retour</a>
</x-masterPartenaire>