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
        <div class='nav navbar-nav ml-auto'>
            <form method='POST' action='/logout'>
                {{ csrf_field() }}
                <button type='submit' class='btn btn-outline-light'>Logout {{ $user->name }}</button>
            </form>
        </div>
    </div>
</header>

<section>
    @yield('content')
</section>

    @if($tudusCount==0)
        <div class='container'>
            <h1 class='display-4 lead text-muted mb-4 center-div mt-4'>You do not have any tudus!</h1>
        </div>
    @else
    <div class='album py-5 bg-light'>
        <div class='container'>
            <div class='row'>
                <div class='col-md-4'>
                    <span class="badge badge-danger mb-2">High</span>
                    @foreach($hightudus as $hightudu)
                        <form method='POST' action='/update/{{$hightudu->id}}'>
                            {{ method_field('put') }}
                            {{ csrf_field() }}
                            <div class='card mb-4 shadow-sm'>
                                <div class='card-body'>
                                    @if($hightudu->isdone)
                                        <s class='card-text'>{{$hightudu->description}}</s>
                                    @else
                                        <p class='card-text'>{{$hightudu->description}}</p>
                                    @endif
                                    <div class='d-flex justify-content-between align-items-center'>
                                        <div class='btn-group'>
                                            @if(!$hightudu->isdone)
                                                <button type='submit'
                                                        name='button'
                                                        value='done'
                                                        class='btn btn-sm btn-outline-secondary'>
                                                    <span class="fa fa-check" aria-hidden="true"></span></button>
                                                <button type='submit'
                                                        name='button'
                                                        value='edit'
                                                        class='btn btn-sm btn-outline-secondary'>
                                                    <span class="fa fa-pencil" aria-hidden="true"></span></button>
                                            @endif
                                            <button type='submit'
                                                    name='button'
                                                    value='delete'
                                                    class='btn btn-sm btn-outline-secondary'><span class="fa fa-trash"
                                                                                                   aria-hidden="true"></span>
                                            </button>
                                        </div>
                                        @if($hightudu->isdone)
                                            <span class="badge badge-success">Done</span>
                                        @endif
                                    </div>
                                </div>
                                <div class='card-footer'>
                                    @foreach($hightudu->tags as $tag)
                                        <span class="badge badge-light">{{$tag->name}}</span>
                                    @endforeach
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
                <div class='col-md-4'>
                    <span class="badge badge-warning mb-2">Medium</span>
                    @foreach($mediumtudus as $mediumtudu)
                        <form method='POST' action='/update/{{$mediumtudu->id}}'>
                            {{ method_field('put') }}
                            {{ csrf_field() }}
                            <div class='card mb-4 shadow-sm'>
                                <div class='card-body'>
                                    @if($mediumtudu->isdone)
                                        <s class='card-text'>{{$mediumtudu->description}}</s>
                                    @else
                                        <p class='card-text'>{{$mediumtudu->description}}</p>
                                    @endif
                                    <div class='d-flex justify-content-between align-items-center'>
                                        <div class='btn-group'>
                                            @if(!$mediumtudu->isdone)
                                                <button type='submit'
                                                        name='button'
                                                        value='done'
                                                        class='btn btn-sm btn-outline-secondary'>
                                                    <span class="fa fa-check" aria-hidden="true"></span></button>
                                                <button type='submit'
                                                        name='button'
                                                        value='edit'
                                                        class='btn btn-sm btn-outline-secondary'>
                                                    <span class="fa fa-pencil" aria-hidden="true"></span></button>
                                            @endif
                                            <button type='submit'
                                                    name='button'
                                                    value='delete'
                                                    class='btn btn-sm btn-outline-secondary'><span class="fa fa-trash"
                                                                                                   aria-hidden="true"></span>
                                            </button>
                                        </div>
                                        @if($mediumtudu->isdone)
                                            <span class="badge badge-success">Done</span>
                                        @endif
                                    </div>
                                </div>
                                <div class='card-footer'>
                                    @foreach($mediumtudu->tags as $tag)
                                        <span class="badge badge-light">{{$tag->name}}</span>
                                    @endforeach
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
                <div class='col-md-4'>
                    <span class="badge badge-info mb-2">Low</span>
                    @foreach($lowtudus as $lowtudu)
                        <form method='POST' action='/update/{{$lowtudu->id}}'>
                            {{ method_field('put') }}
                            {{ csrf_field() }}
                            <div class='card mb-4 shadow-sm'>
                                <div class='card-body'>
                                    @if($lowtudu->isdone)
                                        <s class='card-text'>{{$lowtudu->description}}</s>
                                    @else
                                        <p class='card-text'>{{$lowtudu->description}}</p>
                                    @endif
                                    <div class='d-flex justify-content-between align-items-center'>
                                        <div class='btn-group'>
                                            @if(!$lowtudu->isdone)
                                                <button type='submit'
                                                        name='button'
                                                        value='done'
                                                        class='btn btn-sm btn-outline-secondary'>
                                                    <span class="fa fa-check" aria-hidden="true"></span></button>
                                                <button type='submit'
                                                        name='button'
                                                        value='edit'
                                                        class='btn btn-sm btn-outline-secondary'>
                                                    <span class="fa fa-pencil" aria-hidden="true"></span></button>
                                            @endif
                                            <button type='submit'
                                                    name='button'
                                                    value='delete'
                                                    class='btn btn-sm btn-outline-secondary'><span class="fa fa-trash"
                                                                                                   aria-hidden="true"></span>
                                            </button>
                                        </div>
                                        @if($lowtudu->isdone)
                                            <span class="badge badge-success">Done</span>
                                        @endif
                                    </div>
                                </div>
                                <div class='card-footer'>
                                    @foreach($lowtudu->tags as $tag)
                                        <span class="badge badge-light">{{$tag->name}}</span>
                                    @endforeach
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif

<footer class='text-muted'>
    <div class='container'>
        <p class='center-div'>
            <a href='#'>Back to top</a>
        </p>
    </div>
</footer>

</body>
</html>