<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class Blocks extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'message': "New Block Forged",
            'index': $this->index,
            'transactions': Transactions::collection($this->transactions),
            'proof': $this->proof,
            'previous_hash': $this->previous_hash,
        ];
    }
}
