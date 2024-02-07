<?php
namespace App\Repositories;

use App\Contracts\RoomRepositoryInterface;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RoomRepository implements RoomRepositoryInterface
{   

    //add a staff
    public function addRoom(Request $request){

        $room = Room::create([
            'number' => $request->number,
            'type' => $request->type,
            'capacity' => $request->capacity,
            'bed' => $request->bed,
            'bathroom' => $request->bathroom,
            'kitchen' => $request->kitchen,
            'description' => $request->description,
            'price' => $request->price,
            'tax' => $request->price,
            'features' => json_encode($request->features),
            'status' => 'available',
            'created_by' => Auth::user()->email,
        ]);

        return $room;
    }

    //get all rooms
    public function roomList(){

        return Room::all();
    }

    //show a room for editing
    public function editRoom(string $id){

        return Room::with('image')->where('id',$id)->first();
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
            'modified_by' => Auth::user()->email,
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
