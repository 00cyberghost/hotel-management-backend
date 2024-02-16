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

    //show a room 
    public function showRoom(string $id);

    //update a room
    public function updateRoom(Request $request, string $id);

    //delete a room
    public function deleteRoom(string $id);

    //check room availability
    public function checkRoomAvailability(Request $request);

    //get a room
    public function getRoom(String $id);
}