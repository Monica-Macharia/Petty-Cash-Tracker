<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class PettycashResource extends JsonResource
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
            'name' => $this->name,
            'payment_details' => $this->payment_details,
            'service' => $this->service,
            'cash_payable' => $this->cash_payable,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
