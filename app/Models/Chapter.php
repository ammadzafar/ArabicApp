<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $guarded=[];

    public function alphabets()
    {
        return $this->hasMany(Alphabet::class,'chapter_id','id');
    }
}
