<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkExperienceRequest;
use App\Http\Resources\WorkExperienceResource;
use App\Models\WorkExperience;
use Illuminate\Http\JsonResponse;

class WorkExperienceController extends Controller
{
    /**
     * @param WorkExperienceRequest $request
     * @return WorkExperienceResource
     */
    public function store(WorkExperienceRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = $request->user()->id;
        $workExperience = WorkExperience::create($data);

        return new WorkExperienceResource($workExperience);
    }

    /**
     * @param WorkExperienceRequest $request
     * @param $id
     * @return WorkExperienceResource
     */
    public function update(WorkExperienceRequest $request, $id)
    {
        $workExperience = WorkExperience::find($id);
        $data = $request->all();
        $workExperience->update($data);

        return new WorkExperienceResource($workExperience);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $workExperience = WorkExperience::find($id);
        $workExperience->delete();

        return response()->json(['message' => ' Work experience deleted successfully'], 200);
    }
}
