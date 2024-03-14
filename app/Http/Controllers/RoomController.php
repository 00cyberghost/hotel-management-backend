<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RoomRequest;
use App\Http\Requests\EditRoomRequest;
use Illuminate\Http\Response;
use Illuminate\Http\jsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Contracts\RoomRepositoryInterface;
use App\Contracts\ImageRepositoryInterface;
use App\Repositories\ImageRepository;
use App\Http\Controllers\ImageController;

class RoomController extends Controller
{

    private RoomRepositoryInterface $RoomRepository;
    

    //invoke the __construct method whenever the class is instantiated
    public function __construct(RoomRepositoryInterface $RoomRepository){

        $this->RoomRepository = $RoomRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return $this->RoomRepository->roomList();
       
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
    public function store(RoomRequest $request)
    {
        //modify the request and add a created_by field
        $request['created_by'] = Auth::user()->email;
        
        //convert the features to json
        $request['features'] = json_encode($request->features);

        $res = $this->RoomRepository->addRoom($request);

        if($res){

            $images_rep = new ImageRepository();

            foreach ($request->images as $key => $image) {
                
                $images_rep->addImage($res->id,$image,'abc');
            }

            
        }

        return response()->json(200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return $this->RoomRepository->showRoom($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        return $this->RoomRepository->editRoom($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRoomRequest $request, string $id)
    {
        //
        //modify the request and add a modified_by field
        $request['modified_by'] = Auth::user()->email;

        //convert the features to json
        $request['features'] = json_encode($request->features);

        return $this->RoomRepository->updateRoom($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        return $this->RoomRepository->deleteRoom($id);
    }
    
    //return only rooms that are available on the specified date range
    public function checkRoomAvailability(Request $request){

        return $this->RoomRepository->checkRoomAvailability($request);
    }

    //return only unpaid rooms
    public function unpaidRooms(Request $request){

        return $this->RoomRepository->unpaidRooms($request);
    }

    //return only paid/reserved rooms
    public function paidRooms(Request $request){

        return $this->RoomRepository->paidRooms($request);
    }
}
