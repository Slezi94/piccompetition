<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $users= User::where('super_admin', 0)->get();
        return view('admin.users')->with('users',$users);
    }

    public function update(Request $request){
        $user = User::where('id','=',$request['id'])->update(['name' => $request['name']]);
        
    }

    public function ban(Request $request)
    {
        $user = User::where('id','=',$request['id'])->update(['ban' => $request['ban']]);
        
    }

}
