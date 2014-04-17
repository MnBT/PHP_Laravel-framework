<?php

class HomeController extends BaseController {

	public function index()
	{
        $type = Type::first()->id;
        $products = Products::where('type_id','=',$type)->paginate(9);
        $types = Type::all();
        $cur_type = $type;
		return View::make('index')->with('products',$products)->with('types',$types)->with('cur_type',$cur_type);
	}

    public function indexByType($type) {
        $products = Products::where('type_id','=',$type)->paginate(9);
        $types = Type::all();
        $cur_type = $type;
        return View::make('index')->with('products',$products)->with('types',$types)->with('cur_type',$cur_type);
    }

    public function getProductMinData($id) {
        $product = Products::find($id);
        $product_attr = array();
        $product_attr['id'] = $product->id;
        $product_attr['name'] = $product->name;
        $product_attr['price'] = $product->price;
        $product_attr['photo'] = $product->photo;
        return json_encode($product_attr);
    }

    public function callback() {
        $inputs = Input::all();
        Mail::send('emails.callback', $inputs, function($message)
        {
            $message->to('admin@iholder.net.ua', 'Admin iholder')->subject('Перезвоните мне');
        });
        $types = Type::all();
        return View::make('thanks')->with('types',$types)->with('cur_type','1');
    }

    public function getWarehouse() {
        $warehouse = NP::warenhouse('Запорожье');
        //$warehouse = NP::doMessage();
        return $warehouse;
    }


}