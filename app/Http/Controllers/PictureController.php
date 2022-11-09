<?php

namespace App\Http\Controllers;

use App\Picture;
use Auth;
use Illuminate\Http\Request;
use App\Competition;
use App\PicComp;

class PictureController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $pictures = Picture::get();
        $competitions = Competition::select('competition_title','id')->where('competition_status',1)->get();


        if($user->super_admin == true){
            return view('admin.pictures')->with(['pictures'=>$pictures, 'competitions'=>$competitions]);
            
        }else{
            return view('profile.index')->with(['pictures'=>$pictures, 'competitions'=>$competitions]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pictures = Picture::get();
        $competitions = Competition::select('competition_title','id')->where('competition_status',1)->get();
        return view('profile.create')->with(['pictures'=>$pictures, 'competitions'=>$competitions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pic_title'=>'required|max:255',
            'pic_description'=>'required|max:255',
            'pic_image'=>['required', 'image']
        ]);

        $imagePath = request('pic_image')->store('uploads','public');

        $user = Auth::user();

        $picture = new Picture();
        $picture->user_id = $user->id;
        $picture->pic_title = $request['pic_title'];
        $picture->pic_description = $request['pic_description'];
        $picture->pic_image = $imagePath;
        $picture->save();

        $pictures = Picture::get();
        $competitions = Competition::select('competition_title','id')->where('competition_status',1)->get();
        
        return view('profile.create')->with('showAlert', true)->with(['pictures'=>$pictures, 'competitions'=>$competitions]);
        return view('competition.index')->with(['pictures'=>$pictures]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function show(Picture $picture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function edit(Picture $picture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Picture $picture)
    {
        $pic_comp = new PicComp();
        $pic_comp->pictures_id = $picture->id;
        $pic_comp->competitions_id = $request['competitions_id'];
        $pic_comp->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Picture $picture, Request  $request)
    {
        $picture = Picture::where('id','=',$request['id'])->delete();
        return view('admin.pictures')->with('showAlert', true);

    }

}
