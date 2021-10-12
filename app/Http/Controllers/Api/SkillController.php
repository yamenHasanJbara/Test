<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkillRequest;
use App\Http\Resources\SkillResource;
use App\Models\Skill;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SkillController extends Controller
{
    /**
     * @param SkillRequest $request
     * @return SkillResource|JsonResponse
     */
    public function store(SkillRequest $request)
    {
        $data = $request->all();
        $skill = Skill::find($data['skill_id']);
        $user_id = $request->user()->id;
        $checkIfExist = DB::table('skill_user')
            ->where('skill_id', '=', $skill->id)
            ->where('user_id', '=', $user_id)->exists();
        if ($checkIfExist) {
            return response()->json(['error' => 'Skill already exists'], 200);
        }

        $skill->users()->attach($user_id);

        return new SkillResource($skill);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $skill = Skill::find($id);
        $skill->users()->detach(Auth::id());

        return response()->json(['message' => 'Skill deleted successfully'], 200);
    }
}
