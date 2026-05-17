<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Response;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email|exists:users,email',
            'password' => 'required|string',
        ], [
            'email.exists' => 'User not found',
        ]);

        if ($validator->fails()) {
            return Response::validation($validator->errors()->all(), []);
        };


        $validated = $validator->validated();


        $user = User::where('email', $validated['email'])->first();


        if (Hash::check($validated['password'], $user->password)) {
            $token = $user->createToken('auth_token')->plainTextToken;
            $user = $user->only('name', 'email');
            return $this->authenticated($request, $user, $token);
        }

        return Response::error('Credential did not matched', [], 401);
    }


    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user, $token)
    {
        $data = [
            'token' => $token,
            'user'  => $user,
        ];
        return Response::success('Login Successful', $data, 200);
    }
}
