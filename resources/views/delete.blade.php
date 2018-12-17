@extends('master')

@section('content')

    <main role='main'>

        <section class='jumbotron padding text-center'>
            <h1 class='display-4 lead text-muted mb-4'>Confirm deletion</h1>
            <div class='container'>
                <label class='lead text-danger'>Are you sure you want to delete your tudu?</label>
                <form method='POST' class='justify-content-center' action='/delete/{{$tudu->id}}'>
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class='form-group center-div mb-2'>
                        <textarea disabled class='form-control input-width'
                                  rows='3'
                                  id='description'
                                  name='description'
                                  placeholder='Enter here'>{{$tudu->description}}</textarea>
                    </div>
                    <div class='center-div mb-4'>
                        <label class='lead'>Priority for your tudu</label>
                        <select disabled name='priority' class='form-control'>
                            @foreach($priorities as $priority)
                                <option @if($priority == $tudu->priority){{'selected'}}@endif>{{$priority}}</option>
                            @endforeach
                        </select>
                    </div>
                    @foreach($tags as $tagId => $tagName)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="tags[]" value={{$tagId}} {{ (in_array($tagId, $checkedTags)) ? 'checked' : '' }} disabled>
                            <label class="form-check-label">{{$tagName}}</label>
                        </div>
                    @endforeach
                    <div class='center-div mt-4'>
                        <button type='submit' class='btn btn-danger mb-2'>Delete</button>
                        <button name='cancel' class='btn btn-secondary mb-2'>Cancel</button>
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