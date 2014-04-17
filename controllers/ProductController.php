<?php

class ProductController extends BaseController
{

    private $images_path;
    private $tmp_images_path;
    private $other_products_max = 10;


    public function __construct()
    {
        $this->images_path = '/assets/img/goods';
        $this->tmp_images_path = '/tmp/images/';
    }

    //Displays the details page
    public function detail($type, $id)
    {
        $product = Products::find($id);
        $product_images = $product->getImages();;
        $product_main_image = $product->mainImage($id)->image_name;
        $types = Type::all();
        $cur_type = $type;
        $other_products = Products::where('type_id', '=', $type)->where('id', '<>', $id)->take(10)->get();
        if ($other_products->count() > 1) {
            $id_other_products = range(0, $other_products->count() - 1);
            shuffle($id_other_products);
        } else if ($other_products->count() == 1) {
            $id_other_products = array(0);
        } else {
            $id_other_products = array();
        }
        //$sel_other_products = array_slice($id_products, 0, $this->other_products_max);
        return View::make('detail')
            ->with('product', $product)
            ->with('images',$product_images)
            ->with('main_image',$product_main_image)
            ->with('types', $types)
            ->with('cur_type', $cur_type)
            ->with('other_products', $other_products)
            ->with('id_other_products', $id_other_products);
    }

    //performs order
    public function toOrder()
    {
        $input = Input::all();
        $product = Products::find($input['product_id']);
        $total_price = $product->price * $input['pre_product_count'];
        $username = $input['username'];
        $userphone = $input['userphone'];
        $data = array();
        $data['username'] = $username;
        $data['userphone'] = $userphone;
        $data['product'] = $product;
        $data['total_price'] = $total_price;
        $data['count'] = $input['pre_product_count'];
        $data['product_link'] = URL::to('/detail') . '/' . $input['type_id'] . '/' . $product->id;
        Mail::send('emails.order', $data, function ($message) {
            $message->to('admin@iholder.net.ua', 'Admin iholder')->subject('Новый заказ');
        });
        $types = Type::all();
        return View::make('thanks')->with('types', $types)->with('cur_type', '1');
    }

    public function getProducts($type)
    {
        $products = Products::where('type_id', '=', $type)->get();
        $types = Type::all();
        return View::make('admin.products')
            ->with('products', $products)
            ->with('types', $types)
            ->with('cur_type', $type);
    }

    public function addProduct($type)
    {
        $input = Input::all();
        $product = new Products;
        $product->name = $input['product_name'];
        //$product->photo = $filename;
        $product->price = $input['product_price'];
        $product->type_id = $type;
        $product->content = $input['content'];
        $product->save();
        foreach ($input['images'] as $i => $image) {
            $product_images = new ProductImages;
            $parts = explode('/', $image);
            $image_name = $parts[count($parts) - 1];
            rename(base_path() . $image, base_path() . $this->images_path . '/' . $image_name);
            $product_images->product_id = $product->id;
            $product_images->image_name = $image_name;
            $i == 0 ? $product_images->general = 1 : $product_images->general = 0;
            $product_images->save();
        }
        return Redirect::to(URL::to('admin/products/' . $type));
    }

    public function editProduct($id)
    {
        $method = Request::server('REQUEST_METHOD');
        if ($method == 'GET') {
            $product = Products::where('id', '=', $id)->first();
            $product_images = $product->images;
            return View::make('admin.product_edit')
                ->with('product', $product)
                ->with('images', $product_images);
        } else if ($method == 'POST') {
            $input = Input::all();
            $product = Products::find($id);
            $product->name = $input['product_name'];
            $product->price = $input['product_price'];
            $product->content = $input['content'];
            $product->save();
            if (isset($input['images'])) {
                $product_images = new ProductImages;
                $main_image_exists = $product_images->existsMain($product->id);
                foreach ($input['images'] as $i => $image) {
                    $product_images = new ProductImages;
                    $parts = explode('/', $image);
                    $image_name = $parts[count($parts) - 1];
                    rename(base_path() . $image, base_path() . $this->images_path . '/' . $image_name);
                    $product_images->product_id = $product->id;
                    $product_images->image_name = $image_name;
                    if (!$main_image_exists)
                        $i == 0 ? $product_images->general = 1 : $product_images->general = 0;
                    $product_images->save();
                }
            }

            return Redirect::to(URL::to('admin/products/' . $product->type_id));
        }
    }

    public function deleteProduct($id)
    {
        $product = Products::find($id);
        $type_id = $product->type_id;
        $product_photo = $product->photo;
        if (File::exists($this->images_path . '/' . $product_photo)) {
            File::delete($this->images_path . '/' . $product_photo);
        }
        $product->delete();
        return Redirect::to(URL::to('admin/products/' . $type_id));
    }

    public function setAsMainImage($id)
    {
        $image_model = new ProductImages;
        if ($image_model->setAsMAin($id)) {
            echo 'success';
            die;
        }
        echo 'error';
        die;
    }

}