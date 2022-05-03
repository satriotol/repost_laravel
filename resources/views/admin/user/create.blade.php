@extends('admin.layouts.main')
@section('content')
    <div class="section-header">
        <h1>User Form</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">User Form</h2>
        @include('admin.partials.errors')
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User</h4>
                    </div>
                    <div class="card-body">
                        <form
                            action="@isset($user) {{ route('user.update', $user->id) }} @endisset @empty($user) {{ route('user.store') }} @endempty"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @isset($user)
                                @method('PUT')
                            @endisset
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" value="{{ isset($user) ? $user->name : '' }}"
                                    name="name" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" value="{{ isset($user) ? $user->email : '' }}"
                                    name="email" required>
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select class="custom-select" required name="role">
                                    <option value="">Open this select menu</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}"
                                            @isset($user) @if ($role->name ===
                                                $user->getRoleNames()->first()) selected @endif @endisset>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password Confirmation</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                            <div class="text-right">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
