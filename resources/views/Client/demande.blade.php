<x-master title="{{session('categorie')}}">
        <br>
        <h4 >Formulaire: {{session('categorie')}},{{session('nom_service')}}</h4>
        <h4 class="bg-dark">Description</h4>
        <form action="/reservation" method="POST">
            @csrf
            <div class="form-group">
                <label for="demand-title">Partenaire choisi:</label>
                <input type="text"  placeholder="{{session('nom_partenaire')}}" readonly>
            </div>
            <div class="form-group">
                <label for="demand-title">Titre de votre demande:</label>
                <input type="text" placeholder="{{session('nom_service')}}" readonly>
            </div>
            <div class="form-group">
                <label for="service-address">Le service doit être réalisé à l'adresse suivante:</label>
                <input type="text"  placeholder="{{auth()->user()->Adresse}}">
            </div>
            <div class="form-group">
                <div class="datetime-container">
                    <div>
                        <label>Date:</label>
                        <input type="date" name= "dateR" >
                    </div>
                    <div>
                        <label>Duree:</label>
                        <select name="duree">
                            <option selected="selected"></option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                        </select>
                    </div>
                    <div>
                        <label>Prix:</label>
                        <input type="text" name="prix" readonly id="calculated-price">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Informations supplémentaires pour la réalisation de votre service :</label>
                <textarea name= "inf" placeholder="Informations supplémentaires (L'heure qui vous convient...)"></textarea>
            </div>
            <button type="submit" class="continue-button">CONTINUER</button>
            
        </form>
        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                
                var prixBase = {{ session('prix_service') }}; 
            
                var selectDuree = document.querySelector('select[name="duree"]');
                var inputPrix = document.querySelector('input[name="prix"]');
            
                selectDuree.addEventListener('change', function() {
                    var duree = this.value; 
                    var prixCalcule = prixBase * duree;
                    inputPrix.value = prixCalcule; 
                });
            });
            </script>
            
    
    
</x-master>