<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Vote;

class VoteController extends Controller
{
    public function vote(Request $request){
        $vote = new Vote();
        $vote->piccomps_id= $request['piccomp_id'];
        $vote->users_id = Auth::user()->id;
        $vote->save();
    }
}
