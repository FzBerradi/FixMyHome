<x-mail::message>
# Réservation Annulée

Votre réservation pour le service "{{ $reservation->service->Nom }}"
a été annulée car aucune réponse n'a été reçue dans les 48 heures.

Merci pour votre compréhension.

Cordialement,
L'équipe de {{ config('app.name') }}
</x-mail::message>
