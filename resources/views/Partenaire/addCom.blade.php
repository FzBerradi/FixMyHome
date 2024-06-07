<x-masterPartenaire title="Ajouter Commentaire" >
    
    <div class="feedback-form">
        <h5>Ajouter un commentaire :</h5>
        <br>
        <form  action="{{route('partenaire.add',$reservation->id)}}" method="POST">
            @method('PUT')
            @csrf
        
            <div class="comment">
                <textarea  name="comment" placeholder="Ajouter commentaire"></textarea>
            </div>
            <button type="submit" class="btn-comment">Commenter</button>
        </form>
    </div>
    
    
</x-masterPartenaire>