<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class StudentEnrollment extends Model
{
    protected $guarded =[];


    public function master()
    {
        return $this->belongsTo(User::class,'master_id','id');
    }

    public function student()
    {
        return $this->belongsTo(User::class,'student_id','id');
    }
    public function ratedBy()
    {
        return $this->belongsTo(User::class,'rated_by','id');
    }

    public function masterVoice()
    {
        return $this->belongsTo(MasterEnrollment::class,'master_voice_id','id');
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class,'chapter_id','id');
    }

    public function alphabet()
    {
        return $this->belongsTo(Alphabet::class,'alphabet_id','id');
    }

    public static function checkAvailability($student, $alphabet){
        $record = (new static)::where('student_id', $student)->where('alphabet_id', $alphabet)->first();
        if (empty($record)){
            return  "Not Recorded";
        }
        if ($record && $record->status == "Recorded"){
            return  "Recorded";
        }
        if ($record && $record->status == "Rated"){
            return  "Rated";
        }
    }

    public static function  getStudentRecording($alphabet)
    {
        return (new static)::where('alphabet_id',$alphabet)->where('student_id',Auth::user()->id)->first();
    }

    public function ruleRatings()
    {
        return $this->hasMany(RecordingRule::class,'recording_id','id');
    }

    public static function getRecordingTime()
    {
        $time = (new static)::where('student_id',Auth::user()->id)->whereIn('status',["Recorded","Rated"])->sum('duration');

        return gmdate('i:s', $time);
    }
    public static function getRecordingNumber($record)
    {
        $totalRecordings = (new static)::where('alphabet_id',$record->alphabet_id)->whereIn('status',["Recorded","Rated"])->orderBy('created_at','asc')->get();
        $voiceNumber = 0;
        foreach ($totalRecordings as $key => $recording){
            if ($recording->student_id === $record->student_id){
                $voiceNumber = $key+1;
            }
        }
        $data = [
            'total' => $totalRecordings->count(),
            'voiceNumber' => $voiceNumber,
        ];

        return $data;
    }
}

