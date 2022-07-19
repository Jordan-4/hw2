<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='{{url("css/login.css")}}'>
    <script src="{{ url('js/user.js') }}" defer></script>
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
        <input id="username" type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
        <div id='err_user' class='signup_error hidden'>Invalid username (16 char max)</div>
        <input id="email" type="email" class="form-control-mail" name="email" placeholder="Email Address" required="" autofocus="" />
        <div id='err_email' class='signup_error hidden'>Invalid email</div>
        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required=""/> 
        <div id='err_pass' class='signup_error hidden'>Make password atleast 8 char</div>
        <div id="final_error" class="signup_error hidden">Rivedi le tue credenziali</div>
        <input class="btn" type="submit" value='Register'>   
        <a class="btn" id='register' href='{{url("login")}}'>Login</a>
    </form>

   
</div>
</body>
</html>