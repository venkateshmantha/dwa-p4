<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Tudu</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <link rel="icon" href="{{ asset('favicon.png') }}" />
    <!-- Bootstrap CSS -->
    <link rel='stylesheet'
          href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'
          integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO'
          crossorigin='anonymous'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel='stylesheet' href='/css/main.css'>
</head>

<body>

<header>
    <div class='navbar navbar-dark bg-dark shadow-sm'>
        <div class='container d-flex justify-content-between'>
            <a href='#' class='navbar-brand d-flex align-items-center'>
                <img class='logo' src='/favicon.png' alt='logo'>
                <strong>Tudu</strong>
            </a>
        </div>
    </div>
</header>

<section class='jumbotron padding text-center'>
    <h1 class='display-4 lead font-italic text-muted mb-4'>#Tudu: A Todo that is 140 characters or less</h1>
    <h1 class='display-4 lead mb-4'>Register</h1>
    <div class='container'>
        <p class='mb-4 lead'>Already have an account? <a class='mb-4' href='/login'>Login here</a></p>
        <form method='POST' class='justify-content-center' action='{{ route('register') }}'>
            {{ csrf_field() }}
            <div class='form-group mb-2'>
                <label class='lead' for='name'>Name</label>
                <input class='mb-4' id='name' type='text' name='name' value='{{ old('name') }}' required autofocus>
                @include('field-error', ['field' => 'name'])
                <br>

                <label class='lead' for='email'>E-Mail Address</label>
                <input class='mb-4' id='email' type='email' name='email' value='{{ old('email') }}' required>
                @include('field-error', ['field' => 'email'])
                <br>

                <label class='lead' for='password'>Password (min: 6)</label>
                <input class='mb-4' id='password' type='password' name='password' required>
                @include('field-error', ['field' => 'password'])
                <br>

                <label class='lead' for='password-confirm'>Confirm Password</label>
                <input class='mb-4' id='password-confirm' type='password' name='password_confirmation' required>
                <br>

                <button type='submit' class='btn btn-primary'>Register</button>
            </div>
        </form>
    </div>
</section>

</body>
</html>