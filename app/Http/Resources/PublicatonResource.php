<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PublicatonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $this->load('nameProfile');
        $values = parent::toArray($request);

        $values['create'] = date_format(date_create($values['created_at']), 'y-m-d');


        $values['name_profile'] = $this->nameProfile->name;

        if (isset($values['image'])) {
            $values['image'] = url('storage/'.$values['image']);
        }

        unset($values['deleted_at'], $values['created_at'], $values['updated_at'], $values['id_profile']);

        return $values;
    }

}
