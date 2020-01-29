<?php

namespace App\Imports;

use App\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;


class ProductsImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    private $countRow = 0;

    public function collection(Collection $collection)
    {
        $products = $collection->unique(function ($product) {
            if (isset($product[10]) && $product[10] != null) {
                $product[0] = $product[1];
                $product[1] = $product[2];
                $product[2] = $product[3];
                $product[3] = $product[4];
                $product[4] = $product[5];
                $product[5] = $product[6];
                $product[6] = $product[7];
                $product[7] = $product[8];
                $product[8] = $product[9];
                $product[9] = $product[10];

            }
            return $product[0] . $product[1] . $product[2] . $product[3] . $product[4] . $product[5] . $product[6] . $product[7] . $product[8] . $product[9];

        });
        $this->countRow = $products->count(); // count of rows
        foreach ($products as $row) {
            Product::create([
                'rubric' => $row[0],
                'small_rubric' => $row[1],
                'category_of_product' => $row[2],
                'producer' => $row[3],
                'name_of_product' => $row[4],
                'model_code' => $row[5],
                'product_description' => $row[6],
                'retail_price' => $row[7],
                'guarantee' => $row[8],
                'availability' => $row[9],

            ]);
        }
    }
    public function chunkSize() : int {
        return 12000;
    }
    public function batchSize(): int
    {
        return 1000;
    }
    public function getRowCount(){
        return $this->countRow;
    }

}
