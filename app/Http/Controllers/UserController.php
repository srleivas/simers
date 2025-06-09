<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrUpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreOrUpdateUserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cpf' => $request->cpf,
            'phone' => $request->phone,
            'date_of_birth' => $request->date_of_birth,
        ]);

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(StoreOrUpdateUserRequest $request, User $user)
    {
        $data = $request->only(['name', 'email', 'cpf', 'phone', 'date_of_birth']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index');
    }



    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }

}
