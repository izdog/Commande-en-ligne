<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/form.css">
    <title>Picoti Picota</title>
</head>
<body>
<section>
    <div class="register">
        <div class="formulaire">
            <div class="logo">
                <img src="img/logo2.svg" alt="LOGO">
            </div>
            <h2>Connexion</h2>
            <form class="" role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <input id="email" name="email" type="mail" placeholder="Adresse E-mail" value="{{ old('email') }}" required>
                <input id="password" type="password" placeholder="Mot de passe" name="password" required>
                <input id="submit" type="submit" value="Envoyer">
            </form>
            <div class="errors">
                @if ($errors->has('email'))
                    <span class="">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                @if ($errors->has('password'))
                    <span class="">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="forgottenPass">
                <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
            </div>
        </div>
    </div>
</section>
</body>
</html>