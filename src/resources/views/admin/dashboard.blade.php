@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="text-primary lead">Admin Dashboard</h1>
        </div>
        <div class="col-md-12">
            <div class="container">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Account</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        
                        @if ($user->isAdmin && $user->isModderator)
                        <tr class="table-primary">
                            <td>{{ $user->email }}</td>
                            <td>Admin</td>
                            <td>No Action</td>
                        </tr>

                        @elseif (!$user->isAdmin && $user->isModderator)
                        <tr class="table-success">
                            <td>{{ $user->email }}</td>
                            <td>Modderator</td>
                            <td>
                                <button class="btn btn-info">Change Info</button>
                            </td>
                        </tr>

                        @else
                        <tr class="table-active">
                            <td>{{ $user->email }}</td>
                            <td>Regular User</td>
                            <td>
                                <button class="btn btn-info">Change Info</button>
                                <button class="btn btn-danger">Delete Account</button>
                            </td>
                        </tr>
                        @endif

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection