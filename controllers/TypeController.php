<?php

class TypeController extends BaseController {

    public function addType() {
        $input = Input::all();
        $type = new Type();
        $type->name = $input['type_name'];
        $type->save();
        return Redirect::to(URL::to('/admin'));
    }

    public function editType($id) {
        $method = Request::server('REQUEST_METHOD');
        $type = Type::find($id);
        if ($method == 'GET') {
            return View::make('admin.type_edit')->with('type',$type);
        } else if ($method == 'POST') {
            $input = Input::all();
            $type->name = $input['type_name'];
            $type->save();
            return Redirect::to(URL::to('/admin'));
        }
    }

    public function deleteType($id) {
        $type = Type::find($id);
        $type_id = $type->id;
        $type->delete();
        Products::where('type_id','=',$type_id)->delete();
        return Redirect::to(URL::to('/admin'));
    }
}
