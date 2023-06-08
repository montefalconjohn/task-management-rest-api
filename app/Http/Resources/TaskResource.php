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
                'name' => $this->name,
                'cccNumber' => $this->ccc_number,
                'dateFiled' => $this->date_filed,
                'dateIssued' => $this->date_issued,
                'dateFormed' => $this->date_formed,
                'totalEmployee' => $this->total_employee,
                'totalConnection' => $this->total_connection
            ],
            'relationships' => [
                'statuses' => new StatusResource($this->status),
                'province' => new ProvinceResource($this->province),
                'category' => new CategoryResource($this->category),
                'area' => new AreaResource($this->area)
            ]
        ];
    }
}
