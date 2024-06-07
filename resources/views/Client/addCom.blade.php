<x-master title="Ajouter Commentaire" >

    <div class="feedback-form">
        <h5>Donner une notation (de 1 à 5) :</h5>
        <br>
        <form  action="{{route('reservation.add',$reservation->id)}}" method="POST">
            @method('PUT')
            @csrf

        <div class="rating">
            <select name="rating">
                <option selected>Noter</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="comment">
            <textarea  name="comment" placeholder="Ajouter commentaire"></textarea>
        </div>
        <button type="submit" class="btn-comment">Commenter</button>
    </div>
    </form>

</x-master>
