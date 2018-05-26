@extends('layouts.app')

@section('content')
<script type="text/javascript" src="{{ URL::asset('js/slim.kickstart.min.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/slim.min.css') }}" />

<div class="container">
    <div class="row">
    {{csrf_field()}}
    <div class="d-flex p-2 bd-highlight text-center">
        <div class="slim d-flex p-2 bd-highlight img-thumbnail mx-auto"
            data-service="/slimAsync"
             data-ratio="1:1"
             data-size="150,150"
             data-max-file-size="2"
             data-force-type="png"
             data-will-request="handleRequest">
            <img class="" src="{{ Auth::user()->getAvatarUrl() }}" alt=""/>
            <input type="file" name="slim[]"/>
        </div>
    </div>
    <hr>
</div>

<script>
function handleRequest(xhr) {
    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
}

</script>
<form class="form-horizontal" method="POST" action="{{ route('user.updateProfile') }}">
{{ csrf_field() }} 
    <div class="form-group{{ $errors->has('displayname') ? ' has-error' : '' }}">
        <label for="displayname" class="col-md-4 control-label">Anzeigename</label>
        <div class="col-md-6">
            <input id="displayname" type="displayname" class="form-control" name="displayname" value="{{ Auth::user()->name }}" required autofocus>
            @if ($errors->has('displayname'))
                <span class="help-block">
                    <strong>{{ $errors->first('displayname') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label for="infotext" class="col-md-4 control-label">Beschreibung</label>
        <div class="col-md-6">
            <textarea id="infotext" type="infotext" class="form-control" name="infotext" value="{{ $user->infotext }}" rows="5">{{ $user->infotext }}</textarea>
        </div>
    </div>

    <div class="form-group{{ $errors->has('dateofbirth') ? ' has-error' : '' }}">
        <label for="dateofbirth" class="col-md-4 control-label">Geburtsdatum</label>
        <div class="col-md-6">
            <input id="dateofbirth" type="date" class="form-control" name="dateofbirth" value="{{ $user->birthdate }}" required>
            @if ($errors->has('dateofbirth'))
                <span class="help-block">
                    <strong>{{ $errors->first('dateofbirth') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
            <label for="gender" class="col-md-4 control-label">Geschlecht</label>
            <div class="col-md-6">
            <select class="form-control" name="gender" id="gender">
                <option value="not_specified" {{ ( $user->gender == 'not_specified' ) ? ' selected' : '' }}>keine Angabe</option>
                <option value="female" {{ ( $user->gender == 'female' ) ? ' selected' : '' }}>weiblich</option>
                <option value="male" {{ ( $user->gender == 'male' ) ? ' selected' : '' }}>männlich</option>
                <option value="intersex" {{ ( $user->gender == 'intersex' ) ? ' selected' : '' }}>inter/divers</option>
            </select>
        </div>
    </div>
    <div class="col-md-8 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            Speichern
        </button>
    </div>
</form>
@endsection
