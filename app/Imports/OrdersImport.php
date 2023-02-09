<?php

namespace App\Imports;

use App\Models\orderProduct;
use App\Models\Product;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;

class OrdersImport implements ToModel,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new orderProduct([
            'user_id'     => User::Email($row[0])->value('id'),
            'product_id'   => Product::Title($row[1])->value('id'),
            'quantity'=>$row[2]         
        ]);
    }

    
    public function rules(): array
    {
        return [
            '0' => 'required',
            '1'=> 'required',
            '2' => 'required',
        ];
    }
}
