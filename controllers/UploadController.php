<?php

class UploadController extends BaseController {

    private $tmp_images_path;
    private $images_path;

    public function __construct() {
        $this->tmp_images_path = base_path().'/tmp/images/';
        $this->images_path = base_path().'/assets/img/goods/';
    }

    public function previewImage() {

        if (Input::hasFile('images')) {
            if (getimagesize(Input::file('images'))) {
                $filename = time().'_'.Str::random(20).'.'.Input::file('images')->getClientOriginalExtension();;
                Input::file('images')->move($this->tmp_images_path, $filename);
                echo '/tmp/images/'.$filename;
                die;
            } else {
                $error = sprintf('Файл %s не картинка', Input::file('images')->getClientOriginalName());
                echo $error;
                die;
            }
        }
    }

    public function deleteImage($id) {
        $image = ProductImages::find($id);
        if (File::isFile($this->images_path.$image->image_name)) {
            File::delete($this->images_path.$image->image_name);
            if ($image->general == '1') {
                $image->setFirstAsMain();
            }
            $image->delete();
            echo 'success';
            die;
        }
        echo 'error';
        die;
    }
}
