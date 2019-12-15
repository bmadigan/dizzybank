<?php

namespace App\Domain\Accounts\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'uuid' => $this->uuid,
            'account_id' => $this->account_id,
            'transaction_date' => $this->created_at,
            'account_name' => $this->account->account_name,
            'description' => $this->description,
            'type' => $this->type,
            'amount' => $this->amount,
            'amount_display' => $this->displayAmount(),
            'balance' => $this->balance,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
