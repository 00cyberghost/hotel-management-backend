<?php
namespace App\Repositories;

use App\Contracts\BookingRepositoryInterface;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use Carbon\Carbon;

class BookingRepository implements BookingRepositoryInterface
{   

    //add a staff
    public function addBooking(Request $request){

        $booking = Booking::create([
            'room_id' => $request->room_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'checkin_date' => $request->checkin_date,
            'checkout_date' => $request->checkout_date,
            'no_of_persons' => $request->no_of_persons,
            'status' => $request->status,
            'paid' => $request->paid,
            'payment' => $request->payment,
            'price' => $request->price,
            'notes' => $request->notes,
            'booking_no' => $request->booking_no,
            'booking_type' => $request->booking_type,
            'booked_by' => $request->booked_by,
        ]);

        return $booking;
    }

    //get a booking by checkin date, checkout date and room_id
    public function getBookingByCheckinCheckoutRoomId($checkin,$checkout,$room_id){

        return Booking::where('checkin_date',$checkin)->where('checkout_date',$checkout)->where('room_id',$room_id)->get();
    }

    // //get all rooms
    // public function roomList(){

    //     return Room::all();
    // }

    // //show a room for editing
    // public function editRoom(string $id){

    //     return Room::with('image')->where('id',$id)->first();
    // }

    // //show a room 
    // public function showRoom(string $id){

    //     return Room::with('image')->where('id',$id)->first();
    // }

    // //update a user/staff
    // public function updateRoom(Request $request, string $id){

    //     $user = Room::find($id)->update([
    //         // 'number' => $request->number,
    //         'type' => $request->type,
    //         'capacity' => $request->capacity,
    //         'bed' => $request->bed,
    //         'bathroom' => $request->bathroom,
    //         'kitchen' => $request->kitchen,
    //         'description' => $request->description,
    //         'price' => $request->price,
    //         'price' => $request->tax,
    //         'notes' => $request->notes,
    //         'modified_by' => Auth::user()->email,
    //         // 'password' => Hash::make($request->password),
    //         // 'image' => $request->image,
    //     ]);

    //     return $user;
    // }

    // //delete a room
    // public function deleteRoom(string $id){

    //     $image = Room::find($id)->delete();

    //     return $image;
    // }
}
