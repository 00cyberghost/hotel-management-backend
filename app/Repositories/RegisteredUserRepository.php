<?php
namespace App\Repositories;

use App\Contracts\RegisteredUserRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisteredUserRepository implements RegisteredUserRepositoryInterface
{   
    //store the admin user credentials
    public function store(Request $request) {

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'role' => 'admin',
            'password' => Hash::make($request->password),
        ]);

        return $user;
    }

    
}
