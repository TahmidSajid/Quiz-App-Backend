<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Response;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {

        $validator = $this->validator($request->all());

        if($validator->fails()){
            return Response::validation($validator->errors()->all(),[]);
        }


        try{
            $user = $this->create($request->all());
        }
        catch(Exception $e){
            return Response::error('Registration Failed! Please try again',[],500);
        }

        try {
            $token = $user->createToken("auth_token")->plainTextToken;
        } catch (Exception $e) {
            return Response::error('Failed to generate user token! Please try again',[],500);
        }


        return $this->registered($request,$user,$token);

    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user, $token)
    {
        $data = [
            'token' => $token,
            'user_info' => $user->only('name','email'),
        ];

        return Response::success('User Registration Successfull',$data,201);
    }
}
