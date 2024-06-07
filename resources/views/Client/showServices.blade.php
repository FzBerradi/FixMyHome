

<x-master title="{{ $categoryName }}">
    <div class="service-selection">
        <h2>{{ $categoryName }}</h2>
        <p>Décrivez votre besoin:</p>
        <br>

        <form method="POST" action="/enregistrer-choix">
            @csrf 
            
            <div class="options">
                @foreach($services as $service)
                    <label class="option-button">
                        <input  type="radio" name="service_id" value="{{ $service->id }}">
                        {{ $service->Nom }}
                    </label>
                @endforeach
            </div>

            <button type="submit" class="continue-button">Continuer</button>
        </form>
    </div>
</x-master>
