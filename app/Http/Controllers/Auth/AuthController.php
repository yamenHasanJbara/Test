<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    /**
     * @param UserRequest $request
     * @return UserResource
     */
    public function register(UserRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);
        $token = $user->createToken('API token')->accessToken;

        $resource = new UserResource($user);
        return $resource->additional(['token' => $token]);
    }

    /**
     * @param UserRequest $request
     * @return Application|ResponseFactory|JsonResponse|Response
     */
    public function login(UserRequest $request)
    {
        $data = $request->validated();
        if (!auth()->attempt($data)) {
            return response()->json(['error' => 'Incorrect Details.Please try again']);
        }
        $token = auth()->user()->createToken('API Token')->accessToken;

        return response()->json(['user' => auth()->user(), 'token' => $token]);
    }

    /**
     * @return JsonResponse
     */
    public function logout()
    {
        if (Auth::user()) {
            $user = Auth::user()->token();
            $user->revoke();

            return response()->json(['message' => 'Logout successfully'], 200);
        }

        return response()->json(['message' => 'Unable to Logout']);
    }
}
