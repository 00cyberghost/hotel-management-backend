<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\jsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Contracts\RegisteredUserRepositoryInterface;

class RegisteredUserController extends Controller
{

    private RegisteredUserRepositoryInterface $registeredUserRepository;
    

    //invoke the __construct method whenever the class is instantiated
    public function __construct(RegisteredUserRepositoryInterface $registeredUserRepository){

        $this->registeredUserRepository = $registeredUserRepository;
    }


    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterUserRequest $request): Response
    {

        $user = $this->registeredUserRepository->store($request);

        event(new Registered($user));

        //Auth::login($user);

        return response()->noContent();
    }    

   
}
