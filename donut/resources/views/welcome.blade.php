@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Welcome to Donut Chat!<br>
                    <a href="/register">Register</a> or <a href="/login">LogIn</a> to start!!!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
