<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class Transactions extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {
        return [
            'sender_id' => $this->sender_id,
            'recipient_id' => $this->recipient_id,
            'amount' => $this->amount,
        ];
    }
}
