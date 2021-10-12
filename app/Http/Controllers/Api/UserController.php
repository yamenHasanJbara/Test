<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AllUserInformationResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * @return AllUserInformationResource
     */
    public function index()
    {
        $user = User::find(Auth::id());
        return new AllUserInformationResource($user);
    }
}
