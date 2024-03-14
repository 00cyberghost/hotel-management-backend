<?php
namespace App\Repositories;

use App\Contracts\RoomRepositoryInterface;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Booking;
use Carbon\Carbon;

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
            'size' => $request->size,
            'description' => $request->description,
            'price' => $request->price,
            'tax' => $request->tax,
            'features' => $request->features,
            'status' => 'available',
            'created_by' => $request->created_by,
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

    //show a room 
    public function showRoom(string $id){

        return Room::with('image')->where('id',$id)->first();
    }

    //update a user/staff
    public function updateRoom(Request $request, string $id){

        $user = Room::find($id)->update([
            // 'number' => $request->number,
            'type' => $request->type,
            'capacity' => $request->capacity,
            'bed' => $request->bed,
            'bathroom' => $request->bathroom,
            'kitchen' => $request->kitchen,
            'size' => $request->size,
            'description' => $request->description,
            'price' => $request->price,
            'tax' => $request->tax,
            'features' => $request->features,
            'modified_by' => $request->modified_by,
        
        ]);

        return $user;
    }

    //delete a room
    public function deleteRoom(string $id){

        $image = Room::find($id)->delete();

        return $image;
    }

    //check room availability
    public function checkRoomAvailability(Request $request){

        // Define the start and end date range
        $start_date = Carbon::parse($request->checkin);
        $end_date = Carbon::parse($request->checkout);

        // Retrieve rooms that are available within the date range
        $available_rooms = Room::whereDoesntHave('bookings', function($query) use ($start_date, $end_date) {
            $query->where(function($query) use ($start_date, $end_date) {
                $query->where('checkin_date', '<', $end_date)
                    ->where('checkout_date', '>', $start_date);
            });
        })->get();

        return $available_rooms;
    }

    //rooms that have not been paid for
    public function unpaidRooms(Request $request){

        // Define the start and end date range
        $start_date = Carbon::parse($request->checkin);
        $end_date = Carbon::parse($request->checkout);

        // Retrieve booked rooms that are not paid for within the date range
        return Room::whereHas('bookings', function($query) use ($start_date, $end_date) {
            $query->where(function($query) use ($start_date, $end_date) {
                $query->where('checkin_date', '<', $end_date)
                    ->where('checkout_date', '>', $start_date)
                    ->where('paid','No');
            });
        })->get();

    }

    //rooms that have been paid for
    public function paidRooms(Request $request){

        // Define the start and end date range
        $start_date = Carbon::parse($request->checkin);
        $end_date = Carbon::parse($request->checkout);

        // Retrieve booked rooms that are paid for within the date range
       return Room::whereHas('bookings', function($query) use ($start_date, $end_date) {
            $query->where(function($query) use ($start_date, $end_date) {
                $query->where('checkin_date', '<', $end_date)
                    ->where('checkout_date', '>', $start_date)
                    ->where('paid','Yes');
            });
        })->get();

    }

    //get a room 
    public function getRoom(string $id){

        return Room::where('id',$id)->first();
    }
}
