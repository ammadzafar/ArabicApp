<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterEnrollment extends Model
{
    protected $guarded=[];

    public function master()
    {
        return $this->belongsTo(User::class,'master_id','id');
    }

    public function responses()
    {
        return $this->hasMany(StudentEnrollment::class,'master_voice_id','id');
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class,'chapter_id','id');
    }

    public function alphabet()
    {
        return $this->belongsTo(Alphabet::class,'alphabet_id','id');
    }
}
