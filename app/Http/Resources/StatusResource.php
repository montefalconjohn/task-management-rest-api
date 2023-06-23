<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class StatusResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|\JsonSerializable
     */
    #[ArrayShape(['type' => "string", 'id' => "string", 'attributes' => "array"])] public function toArray(
        $request
    ): array {
        return [
            'type' => 'statuses',
            'id' => (string)$this->id,
            'attributes' => [
                'statusName' => $this->status_name
            ]
        ];
    }
}
