Bonjour,

Merci {{ ucfirst($user->firstname).' '.strtoupper($user->name) }} pour votre inscription.
Vous pouvez valider votre compte en vous rendant sur le lien
{{ url('auth/confirm', [$user->id, $token]) }}