<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StarringResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public static $wrap = 'starrings';
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id'=>$this->resource->id,
            'slug'=>$this->resource->slug,
            'name'=>$this->resource->name
        ];
    }
}