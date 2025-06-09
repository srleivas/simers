@extends('layouts.app')

@section('content')
<div class="container">
    <h2>User List</h2>

    <div class="mb-3">
        <a href="{{ route('users.create') }}" class="btn btn-success">+ Add User</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Phone</th>
                <th>Date of Birth</th>
                <th width="200px">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->cpf }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ \Carbon\Carbon::parse($user->date_of_birth)->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this user?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6">No users found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
