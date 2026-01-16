@extends('layouts.app')

@section('title', 'StudyGram Home Page')

@section('content')

<div class="container p-5 border">
    <div class="row">
        <div class="col-md-8 bg-primary">
            <div class="container text-center">
                <h1 class="display-1 text-bg-primary lead">Welcome to StudyGram</h2>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-md-6">
            <div class="container">
                <h2 class="text-primary">About</h2>
                <p class="text-break text-secondary">
                    This web application was developed for students to share notes among each other.
                </p>
                <p class="text-break text-secondary">
                    Users can use this web application for sharing notes.
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="container">
                <h2 class="text-primary">Features</h2>
                <p class="text-break text-secondary">
                    Users can use features provided by this web application to form a discussion group beyond campus border
                </p>
                <p class="text-break text-secondary">
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item">Dashboard</li>
                        <li class="list-group-item">Public Section</li>
                        <li class="list-group-item">Comming Soon</li>
                        <li class="list-group-item">Comming Soon</li>
                    </ul>
                </p>
            </div>
        </div>
    </div>
</div>

@endsection