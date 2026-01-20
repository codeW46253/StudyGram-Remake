@extends('layouts.app')

@section('title', 'StudyGram Home Page')

@section('content')

<div class="container p-5 border">
    <div class="row">
        <div class="col-md-12 bg-primary">
            <div class="container text-center p-3">
                <h1 class="display-1 text-bg-primary lead">StudyGram</h1>
                <h3 class="text-bg-success p-3 mt-5">Share your ideas today!</h3>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-md-6">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h1>Status</h1>
                    </div>
                    <div class="card-body">
                        <h2>Number of Posts:</h2>
                        <ul class="list-group">
                            <li class="list-group-item">Today: {{ $todaysPostCount }}</li>
                            <li class="list-group-item">This Month: {{ $monthsPostCount }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection