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
            'type' => 'tasks',
            'id' => (string)$this->id,
            'attributes' => [
                'name' => $this->name,
                'createdBy' => $this->created_at,
                'updatedAt' => $this->updated_at
            ],
            'relationships' => [
                'statuses' => new StatusResource($this->status),
            ]
        ];
    }
}
