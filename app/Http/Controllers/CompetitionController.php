<?php

namespace App\Http\Controllers;

use App\Competition;
use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Vote;
use Auth;
use App\PicComp;
use App\User;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $competitions = Competition::get();

        return view('admin.competitions')->with('competitions',$competitions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $competitions = Competition::get();
        return view('admin.create')->with('competitions',$competitions);
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
            'competition_title' => 'required|max:255',
            'competition_description' => 'required|max:255',
            'competition_start' => 'required|date',
            'competition_end' => 'required|date'
        ]);

        $competition = new Competition();
        $competition->competition_title = $request['competition_title'];
        $competition->competition_description = $request['competition_description'];
        $competition->competition_start = $request['competition_start'];
        $competition->competition_end = $request['competition_end'];
        $competition->save();
        return view('admin.create')->with('showAlert', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function show(Competition $competition)
    {
        $winner="";

        $user = User::get();

        $pictures = Picture::join('pic_comps','pictures.id','=','pic_comps.pictures_id')->where('pic_comps.competitions_id', $competition->id)->get();
        $vote = Vote::join('pic_comps','pic_comps.id','=','votes.piccomps_id')->where('votes.users_id',Auth::user()->id)->where('pic_comps.competitions_id',$competition->id)->get();

        if($competition->competition_status == 3){
            $first = Vote::selectRaw('count(*) AS votes, pic_comps.id AS id')->join('pic_comps','pic_comps.id','=','votes.piccomps_id')->where('pic_comps.competitions_id', $competition->id)->groupBy('pic_comps.pictures_id')->orderBy('votes','desc')->first();
            if($first != null){
                $winner = PicComp::select('users.name')->join('pictures','pictures.id','=','pic_comps.pictures_id')->join('users','users.id','=','pictures.user_id')->where('pic_comps.id', $first->id)->first();

            }
        }
        

        

        return view('competitions.index')->with([
            'competitions'=> $competition,
            'pictures'=>$pictures,
            'voted'=>count($vote),
            'winner'=>$winner,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function edit(Competition $competition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Competition $competition)
    {
        $competitions = Competition::where('id', '=', $request['id'])->update(['competition_status'=>3]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competition $competition, Request $request)
    {
        $competitions = Competition::where('id','=',$request['id'])->delete();
        
    }

    public function list(Request $request){

        $competitions = Competition::get();

        $request[
            'type'
        ];

        return view('competitions.'.$request['type'])->with('competitions',$competitions);
    }

}
