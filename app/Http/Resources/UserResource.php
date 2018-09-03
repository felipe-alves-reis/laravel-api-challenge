<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'email' => $this->email,
            'username' => $this->username,
            'active' => $this->active,
            'admin' => $this->admin,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
