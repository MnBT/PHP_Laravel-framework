<?php

class Products extends Eloquent
{
    protected $table = 'products';

    public $timestamps = false;

    public function images()
    {
        return $this->hasMany('ProductImages', 'product_id');
    }

    public function mainImage($product_id)
    {
        return ProductImages::where('product_id','=',$product_id)
            ->where('general','=','1')
            ->first();
    }

    public function getImages() {
        return $this->images()->orderBy('general','desc')->get();
    }
}