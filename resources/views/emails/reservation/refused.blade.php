<x-mail::message>
# Réservation Refusée
Bonjour M. {{$nomClient}},
Nous sommes désolés de vous informer que votre demande de réservation pour le service **{{ $service }}** prévu le **{{ $date }}** a été refusée.
Partenaire : {{$nomPartenaire}}

<x-mail::button :url="''">
Voir plus
</x-mail::button>

Merci de votre compréhension,<br>
{{ config('app.name') }}
</x-mail::message>
