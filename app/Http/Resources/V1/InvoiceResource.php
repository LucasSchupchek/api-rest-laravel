<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    private array $types = ['C' => 'Cartão', 'B' => 'Boleto', 'P' => 'Pix'];

    public function toArray($request)
    {
        $paid = $this->paid;
        return [
            'user' => [
                'firstName' => $this->user->firstName,
                'lastName' => $this->user->lastName,
                'fullName' => $this->user->fullName,
                'email' => $this->user->email,
            ],
            'type' => $this->types[$this->type],
            'value' => 'R$ '.number_format($this->value,2,',','.'),
            'paid' => $paid ? 'Pago' : 'Não Pago',
            'paymentDate' => $paid ? Carbon::parse($this->payment_date)->format('d/m/y h:i:s') : NULL,
            'paymentSince' => $paid ? Carbon::parse($this->payment_date)->diffForHumans() : NULL
        ];
    }
}
