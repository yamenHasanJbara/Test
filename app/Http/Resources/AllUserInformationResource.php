<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class AllUserInformationResource extends JsonResource
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
                'name' => $this->name,
                'email' => $this->email,
                'personalInformation' => $this->info()->get(
                    [
                        'id',
                        'address',
                        'phone',
                        'birthday',
                        'gender',
                        'nationality',
                        'university',
                        'degree',
                        'summary'
                    ]
                )->toArray(),
                'skills' => array_map(function ($skill) {
                    return
                        [
                            'skill_id' => $skill['id'],
                            'skillName' => $skill['name'],
                        ];
                }, $this->skills()->get()->toArray()),
                'languages' => array_map(function ($language) {
                    return
                        [
                            'language_id' => $language['id'],
                            'languageName' => $language['name'],
                        ];
                }, $this->languages()->get()->toArray()),
                'workExperiences' => $this->workExperiences()->get(
                    [
                        'id',
                        'position_name',
                        'city',
                        'country',
                        'start_date',
                        'end_date',
                        'description'
                    ]
                )->toArray(),
            ];
    }
}
