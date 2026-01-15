@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <!-- Header Section -->
            <h2>Public Section</h2>

            <div class="container border">
                <div class="posts">
                    <div class="row">
                        @foreach ($posts as $post)
                        
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text">{{ $post->content }}</p>

                                    {{-- Loop through files --}}
                                    @if($post->files->count())
                                        <ul class="list-unstyled">
                                            @foreach($post->files as $file)
                                                <li>
                                                    <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank">
                                                        {{ basename($file->file_path) }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="text-muted">No attachments</p>
                                    @endif

                                    <small class="text-muted">Created on {{ $post->created_at->format('d M Y') }}</small>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection