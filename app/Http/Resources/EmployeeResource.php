<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'photo' => url('storage/'.$this->photo),
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'hire_date' => $this->hire_date,
            'date_of_birth' => $this->date_of_birth,
            'position' => $this->position,
            'department' => $this->department
        ];
    }
}
