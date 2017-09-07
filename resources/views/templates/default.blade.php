<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/normalize.css">
    <title>Picoti Picota</title>
</head>
<body>

{{--HEADER START--}}
<header>
    <div class="nav_wrapper">
        <div class="logo"><a href="#"><img src="img/logo.svg" alt="picoti picota" height="50px" width="50px"></a></div>
        <button class="hamburger" href="#"><img src="img/barre.png" alt=""></button class="hamburger">
        <nav class="menu">
            <ul>
                <li><a href="">Commander</a></li>
                <li><a href="">Picoti Picota</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </nav>
        <div class="user">
            <a href="#"><span>Compte</span></a>
        </div>
    </div>
</header>
{{--HEADER END--}}

{{--CONTENT START--}}
<div class="content">
            @yield('nav')
            @yield('content')
{{--CONTENT END--}}
<footer>
    <div class="footer_wrapper">
        <div class="socialMedia">
            <h6>Suivez nos nouveautées sur :</h6>
            <ul>
                <li><a href="#"><img src="img/fb.png" alt="Picoti Picota Facebook"></a></li>
                <li><a href="#"><img src="img/twit.png" alt="Picoti Picota Twitter"></a></li>
            </ul>
        </div>
        <div class="sitemap">
            <ul>
                <li><a href="#">Commander</a></li>
                <li><a href="#">Picoti Picota</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
        <div class="copyright">
            <p>© 2017 Florian</p>
            <ul>
                <li><a href="#">Mention légales</a></li>
                <li><a href="#">Conditions générales de vente</a></li>
            </ul>
        </div>
    </div>
</footer>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/app.js"></script>
<script src="js/misc.js"></script>
</html>