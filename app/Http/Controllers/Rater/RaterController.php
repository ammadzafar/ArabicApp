<?php

namespace App\Http\Controllers\Rater;

use App\Models\Alphabet;
use App\Models\Chapter;
use App\Models\RecordingRule;
use App\Models\Rule;
use App\Models\StudentEnrollment;
use App\Util\Constants\AppConstants;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RaterController extends Controller
{
    public function dashboard()
    {
        $alphabets = Alphabet::all();
        $alphabet = '';
        $rules = Rule::all();
        $recordings = [];
        $recordRate = '';
        $firstRecordingRules =[];
        if($alphabets->count() > 0){
            $alphabet = $alphabets->first();
            $recordings = $alphabet->recordings()->orderby('status','asc')->get();
            if ($recordings->count() > 0){
                $recordRate = $recordings->first();
                if ($recordRate->ruleRatings){
                    foreach ($recordRate->ruleRatings as $rating) {
                        $firstRecordingRules[$rating->rule_name] = $rating->rating;
                    }
                }
            }
        }
        $alpha_rules=[];
        return view('rater.dashboard',compact('alphabets','recordings','rules','recordRate','firstRecordingRules','alpha_rules'));
    }

    public function getVoiceList($id)
    {
        try{
            $alphabet = Alphabet::with('recordings','recordings.student','recordings.ruleRatings')->findOrFail($id);
            $recordings = [];
            $data = [];
            if(!empty($alphabet)){
                $recordings = $alphabet->recordings()->with('student','ruleRatings')->orderby('status','asc')->get();
            }
            if ($recordings->count() > 0){
                $record = $recordings->first();
                $data = StudentEnrollment::getRecordingNumber($record);
            }
            return response()->json([
                'status' => 'success',
                'recordings' => $recordings,
                'total' => count($data) > 0 ? $data['total'] : 0,
                'voiceNumber' => count($data) > 0 ? $data['voiceNumber'] : 0,
            ]);
        }catch (\Exception $exception){

            return response()->json([
                'status' => 'error',
                'message' => $exception->getMessage()
            ]);
        }
    }
    public function getRecording($id)
    {
        try{
            $record = StudentEnrollment::findOrFail($id);
            $data= StudentEnrollment::getRecordingNumber($record);

            $recording = StudentEnrollment::with('student','ruleRatings')->findOrFail($id);

            return response()->json([
                'status' => 'success',
                'recording' => $recording,
                'total' => $data['total'],
                'voiceNumber' => $data['voiceNumber'],
            ]);
        }catch (\Exception $exception){

            return response()->json([
                'status' => 'error',
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function submitRating(Request $request)
    {
        try{
            $recording = StudentEnrollment::findOrFail($request->id);
            if ($recording){
                $recording->update([
                    'status' => AppConstants::$status['Rated'],
                    'rating' => $request->rating,
                    'is_rated' => 1,
                    'is_master' => $request->heart ? 1 : 0,
                    'rated_by' => Auth::user()->id,
                ]);
                foreach ($request->ruleRatings as $key => $rating){
                    $rule = Rule::findOrFail($key);
                    $user = RecordingRule::updateOrCreate(['recording_id' => $recording->id, 'rule_id' => $rule->id,
                        'rule_name' => $rule->name], [
                        'recording_id' => $recording->id,
                        'rule_id' => $rule->id,
                        'rule_name' => $rule->name,
                        'rating' => $rating,
                    ]);
                }

                return response()->json([
                    'status' => 'success',
                    'recording' => $recording
                ]);
            }
        }catch (\Exception $exception){

            return response()->json([
                'status' => 'error',
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function alphabetRules(Request $request){

        $alphabets = Alphabet::all();
        $alphabet = '';
        $rules = Rule::all();
        $recordings = [];
        $recordRate = '';
        $firstRecordingRules =[];
        if($alphabets->count() > 0){
            $alphabet = $alphabets->first();
            $recordings = $alphabet->recordings()->orderby('status','asc')->get();
            if ($recordings->count() > 0){
                $recordRate = $recordings->first();
                if ($recordRate->ruleRatings){
                    foreach ($recordRate->ruleRatings as $rating) {
                        $firstRecordingRules[$rating->rule_name] = $rating->rating;
                    }
                }
            }
        }

        $alphabet = Alphabet::findOrFail($request->alphabet_id);
        $alpha_rules = $alphabet->rules;

        return view('rater.alphabets',compact('alpha_rules','rules','alphabets','recordings','recordRate','firstRecordingRules'))->render();
    }

    public function addrules(Request $request){
//        dd($request->all());
        $alphabet = StudentEnrollment::where('alphabet_id',$request->alphabet_id)->first();
            if ($alphabet){
                if ($alphabet->rating == true){
                    return response()->json([
                        'status' => 'error',
                        'message' => "You can not add rule because it's already rated!"
                    ]);
                }else{
                    DB::table('alphabets_rules')->where('alphabet_id',$request->alphabet_id)->delete();
                    $alphabet_rules = Alphabet::findOrFail($request->alphabet_id);
                    foreach($request->values as $value){
                        $alphabet_rules->rules()->attach($value);
                    }
                    return response()->json([
                        'status' => 'success',
                        'message' => "You successfully add rules!"
                    ]);
                }
            }else{
                return response()->json([
                    'status' => 'error',
                    'message' => "Not recorded Yet"
                ]);
            }
    }

    public function deleteRules(Request $request){

        $alphabet = Alphabet::findOrFail($request->alphabet_id);
        $alphabet->rules()->wherePivot('rule_id','=',$request->rule_id)->detach();
        return response()->json([
            'status' => 'success',
        ]);
    }
}
