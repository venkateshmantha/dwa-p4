<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Tudu</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <link rel='shortcut icon' href='{{ asset('favicon.png') }}' />
    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='css/main.css'>
    <link rel='stylesheet'
          href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'
          integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO'
          crossorigin='anonymous'>
</head>

<body>

<section>
    @yield('content')
</section>

</body>
</html>