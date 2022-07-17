<html>

<head>
    <link rel='stylesheet' href='{{ url("css/login.css") }}'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="wrapper">
        @if($error == "campi_vuoti")
        <span>Campi vuoti</span>
        @elseif ($error == "credenziali_errate")
        <span>Credenziali errate</span>
        @endif
        <form name='signup_form' method='post' class="form-signin">
            @csrf
            <h2 class="form-signin-heading">Please login</h2>
            <input type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username') }}"required autofocus />
            <input type="password" class="form-control" name="password" placeholder="Password" required />

            
            <input class="btn" type="submit" value='Login'>
        </form>

        <a value='Register' class="btn btn-2" id='register' href='{{url("signup")}}'>

    </div>
</body>

</html>