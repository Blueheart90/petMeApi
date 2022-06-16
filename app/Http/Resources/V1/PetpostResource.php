<?php

namespace App\Http\Resources\V1;

use App\Http\Resources\V1\UserResource;
use App\Http\Resources\V1\ImageResource;
use App\Http\Resources\V1\UserCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class PetpostResource extends JsonResource
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
            'id' => $this->id,
            'healh_status' => $this->healh_status,
            'age' => $this->petage,
            'location' => $this->location,
            'petgender' => $this->petgender,
            'type' => new PettypeResource($this->pettype),
            'breed' => $this->petbreed->name,
            'name' => $this->petname,
            'size' => $this->petsize,
            'status' => $this->status,
            'description' => $this->petdescription,
            'user' => new UserResource($this->user),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'images' => new ImageCollection($this->images),
        ];
    }
}
