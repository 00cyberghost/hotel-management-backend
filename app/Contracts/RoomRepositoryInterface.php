<?php
namespace App\Contracts;
use Illuminate\Http\Request;



interface RoomRepositoryInterface {
    
    //add a room
    public function addRoom(Request $request);

    //get all rooms
    public function roomlist();

    //show a room for editing
    public function editRoom(string $id);

    // //update a user/staff
    // public function updateStaff(Request $request, string $id);

    // //delete a user/staff
    // public function deleteStaff(string $id);
}