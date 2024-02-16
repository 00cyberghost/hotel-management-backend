<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\ImageRepositoryInterface;

class ImageController extends Controller
{

    private ImageRepositoryInterface $ImageRepository;
    

    //invoke the __construct method whenever the class is instantiated
    public function __construct(ImageRepositoryInterface $ImageRepository){

        $this->ImageRepository = $ImageRepository;
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
        //
        return $this->ImageRepository->addImage($request->room_id,$request->image_name,$request->path);
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
        $image = $this->ImageRepository->getImage($id);

        $imagename = $image->image_name;

        if(\File::exists(public_path('images/'.$imagename))) \File::delete(public_path('images/'.$imagename));

        return $this->ImageRepository->deleteImage($id);

    }

    /**
     * handle image upload and return the new name of the image to the browser client
     *
     * @param  file
     * @return json
     */
    public function uploadRoomImage(Request $request)
    {

        $file = $request->file('file');
        
        $imagename = time().$file->getClientOriginalName();
        
        $file->move('images',$imagename);

        // public_path('photos/'.$previous_image)

        return $imagename;
        
    }
}
