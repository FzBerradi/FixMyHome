@component('mail::message')
# Réservation Supprimée

Bonjour {{ $reservation->client->Nom }},

Nous vous informons que votre réservation a été supprimée car elle n'a pas été acceptée par un partenaire dans les 48 heures suivant sa création.

Nous vous invitons à essayer de faire une nouvelle réservation ou à nous contacter pour toute question.

Merci pour votre compréhension.

Cordialement,<br>
{{ config('app.name') }}
@endcomponent
