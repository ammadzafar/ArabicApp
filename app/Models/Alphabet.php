<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Alphabet extends Model
{
    protected $guarded=[];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function recordings()
    {
        return $this->hasMany(StudentEnrollment::class,'alphabet_id','id');
    }

    public function rules(){
        return $this->belongsToMany(
            Rule::class,
            'alphabets_rules')->withTimestamps();
    }

    public static function checkRating($id)
    {
        $rating = 0;
       $recording = StudentEnrollment::where('alphabet_id',$id)->where('student_id',Auth::user()->id)->first();
        if (!empty($recording) && $recording->status == "Rated"){
            $rating = ($recording->rating/5)*100;
        }

        return $rating;
    }
}
