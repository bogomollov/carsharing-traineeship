<?php

namespace App\Http\Resources\Rent;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request) : array
    {
        return [
            'id' => $this->id,
            'car_id' => $this->car_id,
            'arendator_id' => $this->arendator_id,
            'status' => $this->status,
            'start_datetime' => $this->start_datetime,
            'end_datetime' => $this->end_datetime,
            'rented_time' => $this->rented_time,
            'total_price' => $this->total_price,
        ];
    }
}
