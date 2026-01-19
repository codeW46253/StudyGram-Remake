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
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Account</th>
                            <th>Role</th>
                            <th>Info</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        
                        <x-modal id="changeInfoModal" title="Change User Info">
                            @include('partials.change_info')
                        </x-modal>

                        <x-modal id="deleteAccModal" title="Delete Account">
                            @include('partials.delete_account')
                        </x-modal>

                        @if ($user->isAdmin && $user->isModderator)
                        <!-- Admin -->
                        <tr class="table-primary">
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->email }}</td>
                            <td>Admin</td>
                            <td>
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                    Info
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-item">Phone: {{ $user->phone }}</li>
                                    <li class="dropdown-item">Creation Time: {{ $user->created_at }}</li>
                                    <li class="dropdown-item">Last Update: {{ $user->updated_at }}</li>
                                </ul>
                            </td>
                            <td>No Action</td>
                        </tr>

                        @elseif (!$user->isAdmin && $user->isModderator)
                        <!-- Mods -->
                        <tr class="table-warning">
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->email }}</td>
                            <td>Moderator</td>
                            <td>
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                    Info
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-item">Phone: {{ $user->phone }}</li>
                                    <li class="dropdown-item">Creation Time: {{ $user->created_at }}</li>
                                    <li class="dropdown-item">Last Update: {{ $user->updated_at }}</li>
                                </ul>
                            </td>
                            <td>
                                <button class="btn btn-info change-info-btn"
                                    data-bs-target="#changeInfoModal"
                                    data-id="{{ $user->id }}"
                                    data-name="{{ $user->name }}"
                                    data-phone="{{ $user->phone }}"
                                    data-email="{{ $user->email }}"
                                    data-mod="{{ $user->isModderator }}">Edit</button>
                            </td>
                        </tr>

                        @else
                        <!-- User -->
                        <tr class="table-active">
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->email }}</td>
                            <td>Regular User</td>
                            <td>
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                    Info
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-item">Phone: {{ $user->phone }}</li>
                                    <li class="dropdown-item">Creation Time: {{ $user->created_at }}</li>
                                    <li class="dropdown-item">Last Update: {{ $user->updated_at }}</li>
                                </ul>
                            </td>
                            <td>
                                <button class="btn btn-info change-info-btn"
                                    data-bs-target="#changeInfoModal"
                                    data-id="{{ $user->id }}"
                                    data-name="{{ $user->name }}"
                                    data-phone="{{ $user->phone }}"
                                    data-email="{{ $user->email }}"
                                    data-mod="{{ $user->isModderator }}">Edit</button>
                                <button class="btn btn-danger delete-btn"  data-bs-target="#deleteAccModal" data-id="{{ $user->id }}">Delete Account</button>
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

<script>
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function () {
            const userId = this.getAttribute('data-id');
            console.log(userId);
            const form = document.getElementById('deleteForm');

            // Update form action dynamically
            form.action = "{{ route('users.destroy', ':id') }}".replace(':id', userId);

            // Show the modal (if using Bootstrap)
            const modal = new bootstrap.Modal(document.getElementById('deleteAccModal'));
            modal.show();
        });
    });

    document.querySelectorAll('.change-info-btn').forEach(button => {
        button.addEventListener('click', function () {
            // Get form initial value
            const userId    = this.getAttribute('data-id');
            const userName  = this.getAttribute('data-name');
            const userPhone = this.getAttribute('data-phone');
            const userEmail = this.getAttribute('data-email');
            const userMod   = this.getAttribute('data-mod') == 1 ? true : false;

            // Get form elements
            const form  = document.getElementById('changeInfoForm');
            const name  = document.getElementById('name');
            const phone = document.getElementById('phone');
            const email = document.getElementById('email');
            const role  = document.getElementById('moderator');

            // Update form action dynamically
            form.action  = "{{ route('users.update', ':id') }}".replace(':id', userId);
            name.value   = userName;
            phone.value  = userPhone;
            email.value  = userEmail;
            role.checked = userMod;

            // Show the modal
            const modal = new bootstrap.Modal(document.getElementById('changeInfoModal'));
            modal.show();
        });
    });
</script>

@endsection