<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\PicComp;


class PicCompController extends Controller
{
    public function destroy(Request $request)
    {
        $piccomp = PicComp::where('pictures_id', '=', $request['picture_id'],'and', 'competitons_id', '=',$request['competiton_id'] )->delete();

    }

    public function index(){
        $piccomp = PicComp::join('pictures', 'pictures.id', '=', 'pic_comp.pictures_id')
        ->join('competitions', 'competitions.id', '=', 'pic_comp.competitions_id')
        ->join('users', 'users.id', '=', 'pictures.user_id')
        ->where('users.id', '=', Auth::user()->id);
        return view('adminlte::partials.sidebar.left-sidebar')->with(['piccomp'=>$piccomp]);
        
    }
}
