<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use Illuminate\Http\Response;
use Illuminate\Http\jsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Contracts\UserRepositoryInterface;

class UserController extends Controller
{

    private UserRepositoryInterface $UserRepository;
    

    //invoke the __construct method whenever the class is instantiated
    public function __construct(UserRepositoryInterface $UserRepository){

        $this->UserRepository = $UserRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return $this->UserRepository->staffList();
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
    public function store(AddStaffRequest $request): jsonResponse
    {
        //
        $user = $this->UserRepository->addStaff($request);

        //event(new Registered($user));

        return response()->json(['status' => 'success'], 200);
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
        return $this->UserRepository->editStaff($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStaffRequest $request, string $id)
    {
        //
        return $this->UserRepository->updateStaff($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * handle image upload and return the new name of the image to the browser client
     *
     * @param  file
     * @return json
     */
    public function uploadUserImage(Request $request)
    {

        $file = $request->file('file');
        
        $imagename = time().$file->getClientOriginalName();
        
        $file->move('images',$imagename);

        // public_path('photos/'.$previous_image)

        return $imagename;
        
    }
}
