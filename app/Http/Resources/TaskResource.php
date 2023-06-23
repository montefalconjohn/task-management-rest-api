<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class TaskResource extends JsonResource
{
    /**
     * @var mixed
     */
    private $status;

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|\JsonSerializable
     */
    #[ArrayShape([
        'type' => "string",
        'id' => "string",
        'attributes' => "array",
        'relationships' => "\App\Http\Resources\StatusResource[]"
    ])] public function toArray(
        $request
    ): array {
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
