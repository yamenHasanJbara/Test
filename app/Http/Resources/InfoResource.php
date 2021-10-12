<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class InfoResource extends JsonResource
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
                'address' => $this->address,
                'phone' => $this->phone,
                'birthday' => $this->birthday,
                'gender' => $this->gender,
                'nationality' => $this->nationality,
                'university' => $this->university,
                'degree' => $this->degree,
                'summary' => $this->summary,
                'user' => $this->user()->get(['id', 'name'])->toArray()
            ];
    }
}
