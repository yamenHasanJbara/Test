<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InfoRequest;
use App\Http\Resources\InfoResource;
use App\Models\Info;
use Illuminate\Http\JsonResponse;


class InfoController extends Controller
{
    /**
     * @param InfoRequest $request
     * @return InfoResource|JsonResponse
     */
    public function store(InfoRequest $request)
    {
        $data = $request->all();
        $checkIfExist = Info::getInfoByUserId($request->user()->id);
        if ($checkIfExist) {
            return response()->json(['error' => 'Information is already exist for this user'], '200');
        }

        $data['user_id'] = $request->user()->id;
        $info = Info::create($data);

        return new InfoResource($info);
    }

    /**
     * @param InfoRequest $request
     * @param $id
     * @return InfoResource
     */
    public function update(InfoRequest $request, $id)
    {
        $model = Info::find($id);
        $data = $request->all();
        $model->update($data);

        return new InfoResource($model);
    }
}
