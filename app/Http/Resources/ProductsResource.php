<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'Mã sản phẩm' => $this->id,
            'Tên sản phẩm' => $this->title,
            'Giá' => $this->price,
            'Số lượng' => $this->quntity,
            'Ngày tạo' => $this->created_at,
            'Ngày sửa' => $this->updated_at,
        ];
    }
}
