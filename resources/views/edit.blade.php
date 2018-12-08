@extends('master')

@section('content')

    <main role='main'>

        <section class='jumbotron padding text-center'>
            <h1 class='display-4 lead font-italic text-muted mb-4'>#Tudu: A Todo that is 140 characters or less</h1>
            <div class='container'>
                <label class='lead'>Edit your tudu</label>
                <form method='POST' class='justify-content-center' action='/edit/{{$tudu->id}}'>
                    {{ method_field('put') }}
                    {{ csrf_field() }}
                    <div class='form-group center-div mb-2'>
                        <textarea class='form-control input-width'
                                  rows='3'
                                  id='decription'
                                  name='description'
                                  placeholder='Enter here'>{{$tudu->description}}</textarea>
                    </div>
                    <div class='center-div mb-4'>
                        <label class='lead'>Edit the priority for your tudu</label>
                        <select name='priority' class='form-control'>
                            @foreach($priorities as $priority)
                                <option @if($priority == $tudu->priority){{'selected'}}@endif>{{$priority}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type='submit' class='btn btn-info mb-2'>Save</button>
                </form>
                @if(session('alert'))
                    <div class='alert alert-success center-div' role='alert'>
                        {{ session('alert') }}
                    </div>
                @endif
            </div>
        </section>

        <div class='album py-5 bg-light'>
            <div class='container'>
                <div class='row'>
                    <div class='col-md-4'>
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
                                            @else
                                                <span class="badge badge-danger">High</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                    <div class='col-md-4'>
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
                                            @else
                                                <span class="badge badge-warning">Medium</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                    <div class='col-md-4'>
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
                                            @else
                                                <span class="badge badge-info">Low</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </main>

@endsection