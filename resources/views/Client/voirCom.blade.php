
<x-master title="Commentaires" >
    <br>
    <h5 class="m-3">ID Service Réalisé: {{$reservation->id}}</h5>
    <div class="comments-section">
        <div class="user-comment">
            <h6>Votre Commentaire:</h6>
            <p class="comment-text">{{$reservation->Commentaire_Client}}</p>
            <h6>Note:</h6>
            @for ($i = 0; $i < $reservation->Note_Client; $i++)
                <i class="fas fa-star"></i>
            @endfor
            
        </div>
        
        <div class="partner-response">
            <h6>Commentaire du Partenaire:</h6>
            <p class="comment-text">{{$reservation->Commentaire_Partenaire}}</p>
            
        </div>
    </div>
    
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Retour</a>
</x-master>