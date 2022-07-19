<!DOCTYPE html> 
<html lang="en"> 
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel='stylesheet' href='{{url("css/home.css")}}'>
        <script src='{{url("js/wallpaper.js")}}' defer></script>
        <script src='{{url("js/post.js")}}' defer></script>
        <script src='{{url("js/search.js")}}' defer></script>
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
                    <h1>Post It</h1>
                </div>
                <img id= 'wallpaper'></img>
                <!-- <div id="overlay"></div> -->
            </header>
            
            <div class="dati">
                <strong>{{ $username }}</strong><br>
                <em>Last update: today</em> 
            </div>

            <div class="trova_post">  
                <form class='search'>
                    Find a post
                    <input type="text" id="search"/>
                    <input type="submit" value="Cerca">
                </form>
            </div>

            @if(session("success"))
            <span id="response" class="status">{{ session("success") }}</span>
            @endif

            <div class='post_home'>
                
            </div>
        </body>

</html>
