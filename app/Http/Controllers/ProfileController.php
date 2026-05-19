<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Response;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function logout(Request $request)
    {
        $user = auth()->user();
        $user->currentAccessToken()->delete();

        return Response::success('Logout Successful', [], 200);
    }
}
