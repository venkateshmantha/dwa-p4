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

<section>
    @yield('content')
</section>

<footer class='text-muted'>
    <div class='container'>
        <p class='justify-content-center'>
            <a href='#'>Back to top</a>
        </p>
    </div>
</footer>

</body>
</html>