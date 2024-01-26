<?php
namespace App\Contracts;
use Illuminate\Http\Request;



interface RegisteredUserRepositoryInterface {
    //store admin credentials
    public function store(Request $request);
}