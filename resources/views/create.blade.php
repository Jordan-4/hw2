<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='{{url("css/home.css")}}'>
    <link rel='stylesheet' href='{{url("css/post_something.css")}}'>

    <script src='{{url("js/wallpaper.js")}}' defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&family=Montserrat:wght@200&family=Playfair+Display&family=Questrial&display=swap" rel="stylesheet">
</head>

<body>
    <navbar>
        <a href='{{url("home")}}'>Home</a>
        <a href='{{url("profile")}}'>Profile</a>
        <a class="color" href='{{url("create")}}'>Post something</a>
        <a href='{{url("logout")}}'>Logout</a>
    </navbar>

    <header>
        <div id="static">
            <h1>Create a post</h1>
        </div>
        <img id='wallpaper'></img>
        <div id="overlay"></div>
    </header>

    <form method='post'>
        @csrf
        <h1 id="create">Share your experiences</h1>
        <textarea id='Titolo' name="titolo" placeholder="Titolo.." required></textarea>
        <textarea name="contenuto" placeholder="nuovo post..." required></textarea>
        <label><input type="submit" value="pubblica">&nbsp;</label>
    </form>


    <footer>
        <p> <em>Jordan Codice</em> <br>
            1000001433
        </p>
    </footer>
</body>

</html>