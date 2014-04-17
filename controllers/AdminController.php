<?php

class AdminController extends BaseController
{
    public function index()
    {
        $types = Type::all();
        return View::make('admin.index')->with('types',$types);
    }

    public function login()
    {
        if (Auth::attempt(array('login' => Input::get('login'), 'password' => Input::get('password')))) {
            return Redirect::to('admin');
        } else {
            return Redirect::to('login')
                ->with('login_errors', true);
        }
    }

    public function changePassword() {

    }


}