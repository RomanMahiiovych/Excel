<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'rubric', 'small_rubric', 'category_of_product', 'producer', 'name_of_product', 'model_code',
        'product_description', 'retail_price', 'guarantee', 'availability'
    ];
}
