@extends('layouts.app')
@section('title', 'Profile')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <h4 class="card-header text-center">Update profile</h4>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <form action="{{ route('users.update', $user->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group row">
                                        <label for="email" class="col-4 col-form-label col-form-label">
                                            Email
                                        </label>
                                        <div class="col-8">
                                            <input id="email" type="email" class="form-control" disabled value="{{ $user->email }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-4 col-form-label col-form-label">
                                            Name
                                        </label>
                                        <div class="col-8">
                                            <input id="name" type="text" name="name" class="form-control" value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="new_password" class="col-4 col-form-label col-form-label">
                                            New password
                                        </label>
                                        <div class="col-8">
                                            <input id="new_password" type="password" name="new_password" class="form-control" placeholder="Fill when you want to change password (Optional)">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="confirm_new_password" class="col-4 col-form-label col-form-label">
                                            Confirm new password
                                        </label>
                                        <div class="col-8">
                                            <input id="confirm_new_password" type="password" name="new_password_confirmation" class="form-control" placeholder="Fill when you want to change password (Optional)">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-8 offset-4">
                                            <button class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection