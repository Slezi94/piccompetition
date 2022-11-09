<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function competitions(){
        return $this->belongsToMany(Competition::class, 'pic_comps', 'pictures_id', 'competitions_id');
    }
}
