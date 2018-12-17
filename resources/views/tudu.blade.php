@extends('master')

@section('content')

    <main role='main'>

        <section class='jumbotron padding text-center'>
            <h1 class='display-4 lead text-muted mb-4'>Create Tudu</h1>
            <div class='container'>
                <label class='lead'>Get started by entering a description</label>
                <form method='POST' class='justify-content-center' action='/create'>
                    {{ csrf_field() }}
                    <div class='form-group center-div mb-2'>
                        <textarea class='form-control input-width'
                                  rows='3'
                                  id='description'
                                  name='description'
                                  placeholder='Enter here'>{{old('description')}}</textarea>
                        @include('field-error', ['field' => 'description'])
                    </div>
                    <div class='center-div mb-4'>
                        <label class='lead'>Set the priority for your tudu</label>
                        <select name='priority' class='form-control'>
                            @foreach($priorities as $priority)
                                <option @if (old('priority') == $priority) {{'selected'}} @endif >{{$priority}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class='center-div mb-4'>
                        <label class='lead'>Assign tags for your tudu</label>
                    </div>
                    @foreach($tags as $tagId => $tagName)
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input'
                                   type='checkbox'
                                   name='tags[]'
                                   value={{$tagId}} {{ (in_array($tagId, old('tags',[]))) ? 'checked' : '' }}>
                            <label class='form-check-label'>{{$tagName}}</label>
                        </div>
                    @endforeach
                    @include('field-error', ['field' => 'tags'])
                    <div class='center-div mt-4'>
                        <button type='submit' class='btn btn-info mb-2'>Create</button>
                    </div>
                </form>
                @if(session('alert'))
                    <div class='alert alert-success center-div' role='alert'>
                        {{ session('alert') }}
                    </div>
                @endif
            </div>

        </section>

    </main>

@endsection