<?php
namespace App\Contracts;
use Illuminate\Http\Request;



interface UserRepositoryInterface {
    
    //add a staff
    public function addStaff(Request $request);

    //get all staffs
    public function stafflist();

    //show a user/staff for editing
    public function editStaff(string $id);

    //update a user/staff
    public function updateStaff(Request $request, string $id);
}