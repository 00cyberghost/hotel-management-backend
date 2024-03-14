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
use Carbon\Carbon;

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

        //$room_id = json_decode($request->room_id);

        $room_id_array = $request->room_id;

        $request->status == 'yes' ? $request['status'] = 'Checked In' :  $request['status'] = 'Pending';

        $request['notes'] = null;

        $request['booking_no'] = rand(1000000,9000000);

        $request['booking_type'] = 'receptionist';

        $request['booked_by'] = Auth::user()->email;

       

        //instantiate the room repository class
        $room_instance = new RoomRepository();

        foreach ($request->room_id as $id) {
            
            $room = $room_instance->getRoom(intval($id));

            $price = $room->price;

            $tax = $room->tax;

            $payment = $price + $tax;

            $request['price'] = $price;

            $request['payment'] = $payment;

            $request['paid'] = 'Yes';

            $request['room_id'] = intval($id);

            $request['no_of_persons'] = ceil(intval($request->no_of_persons) / count($room_id_array));
            
            //check if the room is available
            //if a result is returned that means that the booking already exists in the booking table
            $is_available = $this->getBookingByCheckinCheckoutRoomId($request->checkin_date,$request->checkout_date,$id);

            count($is_available) < 1 ? $this->store($request) : abort(400,"Room number ".$room->number." Is Already Booked");
 
        }

        return response()->json('success', 200);

        
        
    }

    /**
     * get a booking by checkin date, checkout date and room_id
     */
    public function getBookingByCheckinCheckoutRoomId($checkin,$checkout,$room_id){

        $checkin = Carbon::parse($checkin);
        $checkout = Carbon::parse($checkout);

        return $this->BookingRepository->getBookingByCheckinCheckoutRoomId($checkin,$checkout,$room_id);
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
