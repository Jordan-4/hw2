<!DOCTYPE html> 
<html lang="en"> 
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel='stylesheet' href='{{url("css/home.css")}}'>
        <script src='{{url("js/wallpaper.js")}}' defer></script>
        <script src='{{url("js/my_post.js")}}' defer></script>
        <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&family=Montserrat:wght@200&family=Playfair+Display&family=Questrial&display=swap" rel="stylesheet">
    </head>

        <body>
            <navbar>
                <a href='{{url("home")}}'>Home</a>
                <a href='{{url("profile")}}'>Profile</a>
                <a class="color" href='{{url("create")}}' >Post something</a>
                <a href='{{url("logout")}}'>Logout</a>
            </navbar>
            
            <header>
                <div id="static">
                    <h1>Your posts</h1>
                </div>
                <img id= 'wallpaper'></img>
                <!-- <div id="overlay"></div> -->
            </header>

            <div class='post_home'>
                <article>
                    
                </article>
            </div>
        </body>

</html>
