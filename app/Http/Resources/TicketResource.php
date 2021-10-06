<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'priority' => $this->priority,
            'status' => $this->status,
            'user_id' => $this->user_id,
            'remark' => $this->remark,
            'photo' => $this->photo,
            'type' => $this->type,
            'URL' => $this->URL,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
