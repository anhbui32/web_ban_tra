<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Category; // trong trường hợp này không cần thiết có đoạn mã này.

/*
    file CategoryResource.php này được tạo ra từ cú pháp:
    'php artisan make:resource CategoryRecource'
 */

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request); //cách này lấy hết trường dữ liệu của một bảng.

        // khi return $this->field trỏ đến trường nào của bảng thì key tương ứng trả về field đó.
        return [        //cách này chỉ và sẽ(trong danh sách trường của bảng không có trường được liệt kê)
            // lấy những trường được liệt kê.
            'id' => $this->id,
            'type_name' => $this->type_name,
            'created_at' => $this->created_at,
            'updated_at' => $this->update_at,
            'countFieldInProduct' => $this->categoryOneToMany->count(),
            'productsInOneTypeOfCategory' => ProductsResource::Collection($this->categoryOneToMany),
        ];
    }
}
