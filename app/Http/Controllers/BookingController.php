<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReceptionistBookingRequest;
use App\Http\Requests\BookingRequest;
use App\Http\Requests\EditBookingRequest;
use Illuminate\Http\Response;
use Illuminate\Http\jsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Contracts\BookingRepositoryInterface;
use App\Repositories\RoomRepository;

class BookingController extends Controller
{

    private BookingRepositoryInterface $BookingRepository;
    

    //invoke the __construct method whenever the class is instantiated
    public function __construct(BookingRepositoryInterface $BookingRepository){

        $this->BookingRepository = $BookingRepository;
    }

    /**
     * Add a booking through the receptionist
     */
    public function receptionistAddBooking(ReceptionistBookingRequest $request)
    {

        return json_decode($request->room_id);

        //instantiate the room repository class
        $room_instance = new RoomRepository();

        $room = $room_instance->getRoom($request->room_id);

        $price = $room->price;

        $tax = $room->tax;

        $payment = $price + $tax;
        
        $request['status'] = 'paid';

        $request['notes'] = null;

        $request['price'] = $price;

        $request['payment'] = $payment;

        $request['booking_no'] = rand(1000000,9000000);

        $request['booking_type'] = 'receptionist';

        $request['booked_by'] = Auth::user()->email;

        return $this->store($request);
        
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->BookingRepository->addBooking($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
