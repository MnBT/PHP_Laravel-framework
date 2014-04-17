<?php

class ProductImages extends Eloquent {

    protected $table = 'product_images';

    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo('Products');
    }

    public function existsMain($product_id) {
        if ($this->where('product_id','=',$product_id)->where('general','=','1')->count() > 0) {
            return true;
        }
        return false;
    }

    public function setAsMAin($id) {
        $image = $this->find($id);
        $product = $image->product;
        $main_image = $product->images()->where('general','=','1')->first();
        $main_image->general = 0;
        $main_image->save();
        $image->general = 1;
        $image->save();
        return true;
    }

    public function setFirstAsMain() {
        $product = $this->product;
        $first_image = $product->images()->where('general','<>','1')->first();
        $first_image->general = 1;
        $first_image->save();
        return true;
    }
}