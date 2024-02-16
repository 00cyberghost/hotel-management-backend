<?php
namespace App\Contracts;
use Illuminate\Http\Request;



interface BookingRepositoryInterface {
    
    //add a booking
    public function addBooking(Request $request);

    // //get all bookings
    // public function bookinglist();

    // //show a booking for editing
    // public function editBooking(string $id);

    // //show a bookking 
    // public function showBooking(string $id);

    // //update a booking
    // public function updateBooking(Request $request, string $id);

    // //delete a booking
    // public function deleteBooking(string $id);
}