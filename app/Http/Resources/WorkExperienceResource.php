<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class WorkExperienceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        return
            [
                'id' => $this->id,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'position_name' => $this->position_name,
                'description' => $this->description,
                'user' => $this->user()->get(['id', 'name'])->toArray()
            ];
    }
}
