<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageRequest;
use App\Http\Resources\LanguageResource;
use App\Models\Language;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LanguageController extends Controller
{
    /**
     * @param LanguageRequest $request
     * @return LanguageResource|JsonResponse
     */
    public function store(LanguageRequest $request)
    {
        $data = $request->all();
        $language = Language::find($data['language_id']);
        $user_id = $request->user()->id;
        $checkIfExist = DB::table('language_user')
            ->where('user_id', '=', $user_id)
            ->where('language_id', '=', $language->id)->exists();
        if ($checkIfExist) {
            return response()->json(['error' => 'Language already added'], 200);
        }

        $language->users()->attach($user_id);
        return new LanguageResource($language);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $language = Language::find($id);
        $language->users()->detach(Auth::id());

        return response()->json(['message' => 'Language deleted successfully'], 200);
    }
}
