<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RoomRequest;
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
        //
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
