<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\PicComp;

class SidebarComposer
{
    public function compose(View $view)
    {
        $sidebar_competitions = PicComp::select('competitions.*')->distinct()->join('pictures', 'pictures.id', '=', 'pic_comps.pictures_id')
        ->join('competitions', 'competitions.id', '=', 'pic_comps.competitions_id')
        ->join('users', 'users.id', '=', 'pictures.user_id')
        ->where('users.id', '=', Auth::user()->id)->get();
        $view->with('sidebar_competitions', $sidebar_competitions);
    }
}