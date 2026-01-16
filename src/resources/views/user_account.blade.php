@extends('layouts.app')

@section('title', 'Account')

@section('content')

<div class="container">
    <div class="row">
        <h2 class="text-primary text-center">User Account</h2>
        <div class="col-md-10">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>{{ auth()->user()->name }}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>{{ auth()->user()->phone }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ auth()->user()->email }}</td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>
                            <x-modal id="resetPasswordModal" title="Reset Password">
                                @include('partials.reset_password')
                            </x-modal>

                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#resetPasswordModal">Reset Password</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <x-modal id="updateAccountModal" title="Update Account">
                @include('partials.update_account')
            </x-modal>

            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateAccountModal">Update Account</button>
        </div>
    </div>
</div>

@endsection