<?php
namespace App\Repositories;

use App\Contracts\ImageRepositoryInterface;
use App\Models\Image;
use Illuminate\Http\Request;


class ImageRepository implements ImageRepositoryInterface
{   

    //add an image
    public function addImage($room_id,$image_name,$image_path){

        $image = Image::create([
            'room_id' => $room_id,
            'image_name' => $image_name,
            'image_path' => $image_path
            
        ]);

        return $image;
    }

    //get all images belonging to a room
    public function getImages($id){

        return Image::where('room_id',$id)->get();
    }

    

    //delete an image
    public function deleteImage(string $id){

        $image = Image::find($id)->delete();

        return $image;
    }

    //delete images
    public function deleteImages(string $room_id){

        $image = Image::where('room_id',$room_id)->delete();

        return $image;
    }
}
