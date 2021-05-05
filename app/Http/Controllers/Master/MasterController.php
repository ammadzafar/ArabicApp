<?php

namespace App\Http\Controllers\Master;

use App\Models\Chapter;
use App\Models\MasterChapter;
use App\Models\MasterEnrollment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MasterController extends Controller
{
    public function index(Request $request)
    {

        $chapters = Chapter::all();
        $alphabets = null;
        if ($chapters->count() > 0){
            $alphabets = $chapters->first()->alphabets;
        }

        return view('master.recordings.voice-enrollment',compact('chapters','alphabets'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'logIn_id'=>'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $recording = new MasterEnrollment();
        $response = [];
        if ($request->logIn_id){
            $master =  User::where('logIn_id',$request->logIn_id)->first();

            if ($master == null){
                $response['status'] = 'error';
                $response['message'] = 'Invalid ID';
            }else{
                $recording->master_id = $master->id;
                $file = $request->file('audio_data');
                $date = Carbon::now();
                $time = str_replace(':','-',$date);
                $date_time = str_replace(' ','_',$time);
                $name = $date_time.'.wav';
                $file->move('uploads/master-enrollments',$name);

                $recording->audio = $name;
                $recording->chapter_id = $request->chapter_id;
                $recording->alphabet_id = $request->alphabet_id;
                $recording->save();

                return 'success';
            }
        }

    }

    public function enrollments()
    {
        $recordings = MasterEnrollment::where('master_id',auth()->user()->id)->get();


        return view('master.recordings.list',compact('recordings'));
    }

    public function getAlphabets(Request $request)
    {
        $chapters = Chapter::all();
        $alphabets = null;
        if ($request->chapter_id){
            $alphabets = Chapter::findOrFail($request->chapter_id)->alphabets;
        }

        return view('master.recordings.voice-enrollment',compact('chapters','alphabets'));
    }
}
