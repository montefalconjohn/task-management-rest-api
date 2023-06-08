<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'type' => 'water-districts',
            'id' => (string)$this->id,
            'attributes' => [
                'name' => $this->name
            ],
            'relationships' => [
                'statuses' => new StatusResource($this->status),
            ]
        ];
    }
}
