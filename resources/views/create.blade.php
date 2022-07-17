<!DOCTYPE html> 
<html lang="en"> 
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel='stylesheet' href='{{url("css/home.css")}}'>
        <script src='home.js' defer></script>
        <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&family=Montserrat:wght@200&family=Playfair+Display&family=Questrial&display=swap" rel="stylesheet">
    </head>

        <body>
            <navbar>
                <a href='{{url("home")}}'>Home</a>
                <a href='profile.php'>Profile</a>
                <a class="color" href='post_something.php' >Post something</a>
                <a href='{{url("logout")}}'>Logout</a>
            </navbar>
            
            <header>
                <div id="static">
                <h1>Post It</h1>
                </div>
                <div id="overlay"></div>
            </header>
            
            <div class="dati">
                <strong>{{ $username }}</strong><br>
                <em>Last update: today</em> 
            </div>

            <div class="api">  
                <form id="wiki">
                    Find a post
                    <input type="text" id="search" />
                    <input type="submit" value="Cerca">
                    <div id="div1"></div>
                </form>
            </div>

            <div class='post_home'>
                <article>
                    
                </article>
            </div>
        </body>

        <footer>
            <p> <em>Jordan Codice</em> <br>
            1000001433 
            </p>
        </footer>
</html>
