@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<!-- Header Section -->
<h2>Welcome, {{ $username ?? 'Guest'}}</h2>

<!-- Posts Section -->
<div class="posts">
    <h3>Your Posts</h3>
    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->content }}</p>
                    <small class="text-muted">Created on {{ $post->created_at->format('d M Y') }}</small>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
