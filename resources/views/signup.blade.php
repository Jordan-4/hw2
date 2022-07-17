<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src='landing.js' defer="true"></script> -->
    <link rel='stylesheet' href='{{url("css/login.css")}}'>
    <title>Document</title>
</head>
<body>


<div class="wrapper">
        @if($error == "campo_vuoto")
        <span>Campi vuoti</span>
        @elseif ($error == "username_esistente")
        <span>Username esistente</span>
        @elseif ($error == "email_esistente")
        <span>Email esistente</span>
        @elseif ($error == "email_non_valida")
        <span>Email non valida</span>
        @elseif ($error == "password_non_valida")
        <span>Password non valida</span>
        @endif
    <form name='signup_form' class="form-signin" method='post'>       
        @csrf
        <h2 class="form-signin-heading">Please register</h2>
        <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
        <div id='err_user' class='signup_error hidden'>Invalid username (16 char max)</div>
        <input type="email" class="form-control-mail" name="email" placeholder="Email Address" required="" autofocus="" />
        <div id='err_email' class='signup_error hidden'>Invalid email</div>
        <input type="password" class="form-control" name="password" placeholder="Password" required=""/> 
        <div id='err_pass' class='signup_error hidden'>Make password atleast 8 char max</div>
        <input class="btn btn-2" type="submit" value='Register'>   
    </form>

    <a value='Login' class="btn btn-2" id='register' href='{{url("login")}}'>
</div>
</body>
</html>