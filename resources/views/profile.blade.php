@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card card-default">
                <div class="panel-heading">{{ Auth::user()->name }}</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <img style="width: 150px; height:150px;" height="150" width="150" src="{{ Auth::user()->getAvatarUrl() }}" alt="Avatar" ><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
