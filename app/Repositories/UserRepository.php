<?php
namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryInterface
{   

    //add a staff
    public function addStaff(Request $request){

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'role' => $request->role,
            'job_description' => $request->job_description,
            'gender' => $request->gender,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'image' => $request->image,
            'created_by' => Auth::user()->email,
        ]);

        return $user;
    }

    //get all users/staff
    public function staffList(){

        return User::all();
    }

    //show a user/staff for editing
    public function editStaff(string $id){

        return User::where('id',$id)->first();
    }

    //update a user/staff
    public function updateStaff(Request $request, string $id){

        $user = User::find($id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'role' => $request->role,
            'job_description' => $request->job_description,
            'gender' => $request->gender,
            'address' => $request->address,
            // 'password' => Hash::make($request->password),
            // 'image' => $request->image,
        ]);

        return $user;
    }

    //delete a user/staff
    public function deleteStaff(string $id){

        $user = User::find($id)->delete();

        return $user;
    }
}
