<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Competition extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pictures(){
        return $this->belongsToMany(Picture::class, 'pic_comps', 'competitions_id', 'pictures_id');
    }

    public function statusChange(){
        
        if($this->competition_start > today()){

        }else if($this->competition_start <= today() && $this->competition_end > today()){
            $this->competition_status = 2;
            $this->save();
        }else if($this->competition_end <= today()){
            $this->competition_status = 3;
            $this->save();
        }   
    }
}
