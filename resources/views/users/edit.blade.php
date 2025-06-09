@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit User</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <a href="{{ route('users.index') }}" class="btn btn-secondary">← Back to List</a>

        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') ?: $user->name }}" required>
            </div>
            <div class="mb-3">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') ?: $user->email }}" required>
            </div>
            <div class="mb-3">
                <label>password:</label>
                <input type="password" name="password" class="form-control" value="{{ old('password') }}">
            </div>
            <div class="mb-3">
                <label>Date of Birth:</label>
                <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth') ?: $user->date_of_birth }}">
            </div>
            <div class="mb-3">
                <label>CPF:</label>
                <input type="text" name="cpf" class="form-control" value="{{ old('cpf') ?: $user->cpf }}">
            </div>
            <div class="mb-3">
                <label>Phone:</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') ?: $user->phone }}">
            </div>
            <button class="btn btn-primary">Update</button>
        </form>

    </div>
@endsection