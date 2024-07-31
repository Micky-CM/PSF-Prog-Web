<?php

namespace App\Http\Resources;

use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
{

    /**
     * The "data" wrapper that should be applied.
     *
     * @var string|null
     */
    public static $wrap = 'sale';

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user = User::find($this->user_id);
        $products = Sale::find($this->id)->products;


        return [
            'id' => $this->id,
            'client' => $this->client,
            'user' => $user,
            'products' => new SaleDetailCollection( $products ),
            'total' => $this->total,
        ];
    }
}
