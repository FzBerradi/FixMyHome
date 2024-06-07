<x-mail::message>
    # Réservation Acceptée
Bonjour M. {{$nomClient}},
Félicitations ! Votre demande de réservation pour le service **{{ $service }}** prévu le **{{ $date }}** a été acceptée.
Partenaire : {{$nomPartenaire}}

<x-mail::button :url="''">
Voir plus
</x-mail::button>

Merci de votre compréhension,<br>
{{ config('app.name') }}
</x-mail::message>

