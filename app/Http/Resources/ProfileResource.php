<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $values = parent::toArray($request);
        if (isset($values['image'])){
            $values['image'] = url('storage/'.$values['image']);
        }
        $values['create'] = date_format(date_create($values['created_at']),'y-m-d');
        unset($values['password'],$values['created_at'],$values['deleted_at'],$values['updated_at']);

        return $values;
    }
}
