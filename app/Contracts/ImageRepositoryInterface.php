<?php
namespace App\Contracts;
use Illuminate\Http\Request;



interface ImageRepositoryInterface {
    
    //add an image
    public function addImage($room_id,$image_name,$image_path);

    //get all images
    public function getImages($id);

    //delete an image
    public function deleteImage(string $id);

    //delete room images
    public function deleteImages(string $room_id);
}