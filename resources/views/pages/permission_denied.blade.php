@extends('layouts.app')
@section('title', 'No access')

@section('content')

<div class="col-md-4 col-md-offset-4">
    <div class="panel panel-default">
        <div class="panel-body">
            @if (Auth::check())
                <div class="alert alert-danger text-center">
                    The current login account has no background access.
                </div>
            @else
                <div class="alert alert-danger text-center">
                    Please log in and operate again
                </div>

                <a class="btn btn-lg btn-primary btn-block" href="{{ route('login') }}">
                    <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
                    Log in
                </a>
            @endif
        </div>
    </div>
</div>

@stop